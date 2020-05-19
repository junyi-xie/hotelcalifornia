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
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $_SESSION['test'] = 'hello';
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

    public function addroom($room_name, $room_price, $room_number, $room_floor, $category_id)
    {
        // query to add a room. TODO: need to add duplication check.
        $stmt = $this->pdo->prepare("INSERT INTO rooms (room_name, room_price, room_number, room_floor, category_id) VALUES (:name, :price, :number, :floor, :id)");

        // binding the variable data.
        $stmt->bindParam(':name', $room_name);
        $stmt->bindParam(':price', $room_price);
        $stmt->bindParam(':number', $room_number);
        $stmt->bindParam(':floor', $room_floor);
        $stmt->bindParam(':id', $category_id);

        $stmt->execute();
        return true;        
    }

    public function deleteroom($id)
    {
        // delete room with given id number.
        $stmt = $this->pdo->prepare("DELETE FROM rooms where id=:id");
        $stmt->execute(array(":id"=>$id));
        return true;
    }
}
