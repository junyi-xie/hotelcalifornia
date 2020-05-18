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

    public function user($name, $email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE name=:name OR email=:email LIMIT 1");
        $stmt->execute(array(':name'=>$name, ':email'=>$email));
       
        $query = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);

        if($stmt->rowCount() > 0):
        $_SESSION['message'] = 'USER EXISTS';
            else:
            if($query->execute() ):
                $_SESSION['message'] = 'USER CREATED';
            else:
                $_SESSION['message'] = 'ERROR';
            endif; 
        endif;       
    }
}