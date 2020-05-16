<?php
class User
 
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
    public function login($username,$password)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:username LIMIT 1");
          $stmt->execute(array(':username'=>$username));
          $user=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($password, $user['user_password']))
             {
                $_SESSION['user_session'] = $user['user_id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
   
   public function redirect($url)
   {
       header("Location: $url");
   }
   
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return false;
   }
}
?>