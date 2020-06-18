<?php
session_start();
class Database
{
    protected $hostname;

    protected $username;

    protected $password;

    protected $dbname;

    private $charset = 'utf8mb4';

    public $pdo;

    public function __construct($host, $user, $pass, $db)
    {
        $this->hostname = $host;
        $this->username = $user;
        $this->password = $pass;
        $this->dbname = $db;
        $this->connect();
    }
    
    public function connect()
    {
        $dsn = "mysql:host=$this->hostname;dbname=$this->dbname;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function disconnect()
    {
        // disconnects db connection
        $this->pdo = null;
        return true;
    }

    public function login($username, $password)
    {
        // selects username and password. checks if data submitted matches in db
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_name=:username");
        $stmt->execute(array(':username'=>$username));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // if values from form post matches the other query will run
        if($stmt->rowCount() > 0) {
            // verify password
            if(password_verify($password, $user['user_password']))
            {
                // query succesful
                $_SESSION['user_session'] = $user['id'];
                return true;
            } else {
                // error
                return false;
            }
        }
    }
    
    public function loggedin()
    {
        // checks if user is already logged in with sessions
       if(isset($_SESSION['user_session']))
        {
            $user_id = $_SESSION['user_session'];
            // selects the user with the id from session user
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id=:user_id");
            $stmt->execute(array(":user_id"=>$user_id));
            $stmt->fetch(PDO::FETCH_ASSOC);
            return true;
        }
    }

    public function redirect($url)
    {
        // redirect to specific page
        header("Location: $url");
    }

    public function showroom($category)
    {
        // show rooms by category type
        $stmt = $this->pdo->prepare("SELECT * FROM rooms where category_id=:category");
        $stmt->execute(array(":category"=>$category));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addroom($room_name, $room_price, $room_number, $room_floor, $category_id, $room_description)
    {
        // select all from rooms with the given room number and floor
        $select = $this->pdo->prepare("SELECT * FROM rooms WHERE room_number=:room_number AND room_floor=:room_floor");
        $select->execute(array(':room_number'=>$room_number, ':room_floor'=>$room_floor));

        // query to add a room
        $stmt = $this->pdo->prepare("INSERT INTO rooms (room_name, room_price, room_number, room_floor, category_id, room_description) VALUES (:name, :price, :number, :floor, :category_id, :description)");

        // binding the variable data.
        $stmt->bindParam(':name', $room_name);
        $stmt->bindParam(':price', $room_price);
        $stmt->bindParam(':number', $room_number);
        $stmt->bindParam(':floor', $room_floor);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':description', $room_description);

        // checks if there are no duplicates.
        if($select->rowCount() > 0):
            // room already exists and query stops here
            return $_SESSION['create_room_message'] = 'Room already exists!';
        else:
            // run the query
            if($stmt->execute() ):
                // new room has been added
                return $_SESSION['create_room_message'] = 'Room has been added!';
            else:
                // error message
                return $_SESSION['create_room_message'] = 'ERROR!';
            endif; 
        endif;       
    }

    public function removeroom($room_id)
    {
        // delete room with given room number and floor.
        $stmt = $this->pdo->prepare("DELETE FROM rooms where room_id=:room_id");
        $stmt->execute(array(":room_id"=>$room_id));
        return true;
    }

    public function addcustomer($first_name, $last_name, $address, $zip, $city, $country, $telephone, $email)
    {
        // query to check if the user already exists, with the given email and telephone
        $select = $this->pdo->prepare("SELECT * FROM customers WHERE customer_telephone=:telephone OR customer_email=:email");
        $select->execute(array(':telephone'=>$telephone, ':email'=>$email));

        // preparing the query to insert into the customer table
        $stmt = $this->pdo->prepare("INSERT INTO customers (customer_first_name, customer_last_name, customer_address, customer_zip_code, customer_city, customer_country, customer_telephone, customer_email) VALUES (:first_name, :last_name, :address, :zip, :city, :country, :telephone, :email)");

        // binding the values 
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':zip', $zip);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);

        // duplicate check to make sure no duplicate records exist in database
        if($select->rowCount() > 0):
            // when the select query selected something from database there is duplicate and  code will not continue
            return $_SESSION['customer'] = 'Customer already exists!';
        else:
            // executing the query if no results return from the select query
            if($stmt->execute() ):
                // return true when finished
                return $_SESSION['customer'] = 'Customer has been added!';
            else:
                // error message when failed 
                return $_SESSION['customer'] = 'ERROR!';
            endif; 
        endif;     
    }

    public function editroom( $room_id, $room_name, $room_price, $room_number, $room_floor, $category_id, $room_description)
    {
        // updating the room query
        $update = $this->pdo->prepare("UPDATE rooms SET room_name=:name, room_price=:price, room_number=:number, room_floor=:floor, category_id=:category, room_description=:description WHERE room_id=:room_id");
  
        // the values for the query
        $update->bindParam(':room_id', $room_id);
        $update->bindParam(':name', $room_name);
        $update->bindParam(':price', $room_price);
        $update->bindParam(':number', $room_number);
        $update->bindParam(':floor', $room_floor);
        $update->bindParam(':category', $category_id);
        $update->bindParam(':description', $room_description);
        
        // executing the query 
        if($update->execute() ):
            // when success leave positive message
            return $_SESSION['update_room_message'] = 'Room has been modified!';
        else:
            // when failure leave error message
            return $_SESSION['update_room_message'] = 'ERROR!';
        endif;
    }

    public function showcustomers($customer_id) {
        // show the customer by selected id
        $stmt = $this->pdo->prepare("SELECT * FROM customers WHERE customer_id=:customer_id");
        $stmt->execute(array(":customer_id"=>$customer_id));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function bookreservation($reservation_start_date, $reservation_end_date, $customer_id, $room_id)
    {
        // selects something from database with the given values
        $select = $this->pdo->prepare("SELECT * FROM reservations WHERE reservation_start=:start_date AND reservation_end=:end_date AND room_id=:room_id");
        $select->execute(array(':start_date'=>$reservation_start_date, ':end_date'=>$reservation_end_date, ':room_id'=>$room_id));

        // preparing the insert statement, does not execute it yet
        $stmt = $this->pdo->prepare("INSERT INTO reservations (reservation_start, reservation_end, customer_id, room_id) VALUES (:start_date, :end_date, :customer_id, :room_id)");

        // binding the params of the placeholders in the query
        $stmt->bindParam(':start_date', $reservation_start_date);
        $stmt->bindParam(':end_date', $reservation_end_date);
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':room_id', $room_id);

        // checks if the select query returns something
        if($select->rowCount() > 0):
            // returned query is above 0 and there is a duplicate
            return $_SESSION['book'] = 'Room is already booked!';
        else:
            // execute the query
            if($stmt->execute()):
                // successful and room has been booked
                return $_SESSION['book'] = 'Room has been booked!';
            else:
                // error code
                return $_SESSION['book'] = 'ERROR!';
            endif; 
        endif;   
    }

    public function showreservation($reservation_id)
    {
        // show the reservation of the selected reservation id
        $stmt = $this->pdo->prepare("SELECT * FROM reservations WHERE reservation_id=:reservation_id");
        $stmt->execute(array(":reservation_id"=>$reservation_id));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addcategory($category_name)
    {
        // add a new category to the categories table
        $stmt = $this->pdo->prepare("INSERT INTO categories (category_name) VALUES (:category_name)");
        // bind the values from the form post
        $stmt->bindParam(':category_name', $category_name);
        $stmt->execute();
        return true;
    }

    public function removecategory($category_id)
    {
        // remove a category where the id equals to the id given in the function
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE category_id = :category_id");
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        return true;
    }

    public function showroombycategory($category_id)
    {
        // select all the room by category type
        $stmt = $this->pdo->prepare("SELECT * FROM rooms WHERE category_id = :category_id");
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        return true;
    }

    public function printinvoice()
    {
        // get function to get the link
        if(isset($_GET['export'])){
            // if get export equals to true then following code will run
            if($_GET['export'] == 'true'){
        
                // select the data from db which are needed for the execel file
                $stmt = $this->pdo->prepare("SELECT * FROM reservations INNER JOIN rooms ON rooms.room_id = reservations.room_id INNER JOIN customers ON customers.customer_id = reservations.customer_id  WHERE reservation_id = :reservation_id");
                $stmt->bindParam(':reservation_id', $_GET['id']);
                $stmt->execute();
                // fetchall for the foreach loop later
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                // limiter
                $limiter = ",";
                $filename = "invoice-data-" . date('Y/m/d') . ".csv"; // Create file name
             
                // create a file pointer
                $fopen = fopen('php://memory', 'w'); 
        
                // head
                $head = array('ID', 'First Name', 'Last Name', 'Check In', 'Check Out', 'Room Name', 'Room Price', 'Room Number', 'Room Floor', 'Category', 'Description', 'Address', 'Zip', 'City', 'Country', 'Telephone', 'Email');
                fputcsv($fopen, $head, $limiter);
             
                // output each row of the data, format line as csv and write to file pointer
                foreach ($results as $row) {   
                    $data = array($row['reservation_id'], $row['customer_first_name'], $row['customer_last_name'], $row['reservation_start'], $row['reservation_end'], $row['room_name'], $row['room_price'], $row['room_number'], $row['room_floor'], $row['category_id'], $row['room_description'], $row['customer_address'], $row['customer_zip_code'], $row['customer_city'], $row['customer_country'], $row['customer_telephone'], $row['customer_email']);
                    fputcsv($fopen, $data, $limiter,);
                }
             
                // move back to beginning of file
                fseek($fopen, 0);
             
                // set headers to download file rather than displayed
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '";');
             
                // output all remaining data on a file pointer
                fpassthru($fopen);
            }
        }
    }
}

$db = new Database('localhost','root','','hotelcalifornia');