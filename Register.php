<?php
/**
 * Created by Salman zafar.
 * User: salman zafar
 * Date: 11/14/2017
 * Time: 12:49 PM
 */

include "db.php";
include "scripts.php";
class Register{


    public function regitser_user()
    {

        $db = new DbConn();
        $conn = $db->conn;

        if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass1']))
        {
            $email = $_POST['email'];
            $pass  = $_POST['pass'];
            $pass1 = $_POST['pass1'];

            if(!empty($email) && !empty($pass) && !empty($pass1))
            {
                if($this->compare_pass($pass,$pass1))
                {

                    $sql = "SELECT * FROM `regs` WHERE email='$email'";
                    $res = $conn->query($sql);

                    if($res->num_rows> 0)
                    {
                        return "Email already exist";
                    }
                    else
                    {
                        $e_pass = $this->encrypt_pass($pass);
                        $insert = "INSERT INTO `regs`(email,pass) VALUES('$email','$e_pass')";
                        if($conn->query($insert) === TRUE)
                        {
                            $_SESSION['logged_in'] = $email;
                            return header('location:dashboard.php');
                        }
                        else
                        {
                            return "Unable to register you".$conn->error_no;
                        }
                    }

                }
                else
                {
                    return "Password doesnt match";
                }
            }
        }

    }

    public function compare_pass($pass, $pass1)
    {
        if($pass == $pass1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function encrypt_pass($pass)
    {
        return password_hash($pass,PASSWORD_DEFAULT);
    }
}

$register = new Register();
$resp = $register->regitser_user();
echo "<div class='container alert alert-danger'>";
echo $resp;
echo "</div>";