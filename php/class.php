<?php
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
        $this->pdo = null;
        return true;
    }

    public function login($username, $password)
    {
        // selects username and password. checks if data submitted matches in db.
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_name=:username");
        $stmt->execute(array(':username'=>$username));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0) {
            if(password_verify($password, $user['user_password']))
            {
                $_SESSION['user_session'] = $user['id'];
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function loggedin()
    {
        // checks if user is already logged in with sessions.
       if(isset($_SESSION['user_session']))
        {
            $user_id = $_SESSION['user_session'];
            $stmt = $this->pdo->prepare("SELECT id FROM users WHERE id=:user_id");
            $stmt->execute(array(":user_id"=>$user_id));
            $stmt->fetch(PDO::FETCH_ASSOC);
            return true;
        }
    }

    public function redirect($url)
    {
        // redirect to specific page.
        header("Location: $url");
    }

    public function showroom($category)
    {
        // show rooms by category type.
        $stmt = $this->pdo->prepare("SELECT * FROM rooms where category_id=:category");
        $stmt->execute(array(":category"=>$category));
        $showroom = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $showroom;
    }

    public function addroom($room_name, $room_price, $room_number, $room_floor, $category_id, $room_description)
    {
        // select all from rooms with the given room number and floor.
        $select = $this->pdo->prepare("SELECT * FROM rooms WHERE room_number=:room_number AND room_floor=:room_floor");
        $select->execute(array(':room_number'=>$room_number, ':room_floor'=>$room_floor));

        // query to add a room.
        $stmt = $this->pdo->prepare("INSERT INTO rooms (room_name, room_price, room_number, room_floor, category_id, room_description) VALUES (:name, :price, :number, :floor, :id, :description)");

        // binding the variable data.
        $stmt->bindParam(':name', $room_name);
        $stmt->bindParam(':price', $room_price);
        $stmt->bindParam(':number', $room_number);
        $stmt->bindParam(':floor', $room_floor);
        $stmt->bindParam(':id', $category_id);
        $stmt->bindParam(':description', $room_description);

        // checks if there are no duplicates.
        if($select->rowCount() > 0):
            return false;
        else:
            if($stmt->execute() ):
                return true;
            else:
                return false;
            endif; 
        endif;       
    }

    public function removeroom($room_id)
    {
        // delete room with given room number and floor.
        $stmt = $this->pdo->prepare("DELETE FROM rooms where id=:room_id");
        $stmt->execute(array(":room_id"=>$room_id));
        return true;
    }

    public function addcustomer($first_name, $last_name, $address, $zipcode, $city, $country, $telephone, $email)
    {
        $select = $this->pdo->prepare("SELECT * FROM customers WHERE customer_telephone=:telephone OR customer_email=:email");
        $select->execute(array(':telephone'=>$telephone, ':email'=>$email));

        $stmt = $this->pdo->prepare("INSERT INTO customers (customer_first_name, customer_last_name, customer_address, customer_zip_code, customer_city, customer_country, customer_telephone, customer_email) VALUES (:first_name, :last_name, :address, :zipcode, :city, :country, :telephone, :email)");

        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':zipcode', $zipcode);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);

        if($select->rowCount() > 0):
            return false;
        else:
            if($stmt->execute() ):
                return true;
            else:
                return false;
            endif; 
        endif;     
    }

    public function showcustomers($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM customers WHERE id=:customer_id");
        $stmt->execute(array(":customer_id"=>$id));
        $showcustomers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $showcustomers;
    }

    public function reservation()
    {
        // $select = $this->pdo->("SELECT * FROM reservations WHERE")
    }
}
