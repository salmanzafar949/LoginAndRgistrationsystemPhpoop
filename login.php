<?php
/**
 * Created by PhpStorm.
 * User: ges
 * Date: 11/13/2017
 * Time: 3:23 PM
 */
include "db.php";
include "scripts.php";
class Login
{
    protected $email;
    protected $pass;

    public function login()
    {
        if(isset($_POST['email']) && isset($_POST['pass']))
        {
             $this->email = $_POST['email'];
             $this->pass  = $_POST['pass'];
            $db = new DbConn();
            $conn = $db->conn;
             if(!empty($this->pass) && !empty($this->email)) {
                 $sql = "SELECT * FROM `regs` WHERE email ='$this->email'";
                 $res = $conn->query($sql);
                 if($res->num_rows > 0 )
                 {
                      $row = $res->fetch_assoc();
                      if($this->decrypt_pass($this->pass, $row['pass'])) {
                          $_SESSION['logged_in'] = $this->email;
                          //return $_SESSION['logged_in'];
                          return header('location:dashboard.php');
                      }
                      else
                      {
                          return "Invalid password";
                      }
                 }
                 else
                 {

                     return "No User found";

                 }
             }
             else
             {
                 echo "fields Cannot be empty";
             }
        }
        else
        {
            header('location:index.php');
        }
    }

    public function decrypt_pass($pass, $e_pass)
    {
        return password_verify($pass, $e_pass);
    }
}


