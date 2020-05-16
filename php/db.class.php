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
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_name=:username");
        $stmt->execute(array(':username'=>$username));
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0) {
            if(password_verify($password, $userRow['user_password']))
            {
                $_SESSION['user_session'] = $userRow['id'];
                return true;
            } else {
                return false;
            }
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}