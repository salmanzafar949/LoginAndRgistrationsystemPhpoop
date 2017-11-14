<?php
/**
 * Created by Salman Zafar.
 * User: Salman
 * Date: 11/14/2017
 * Time: 12:34 PM
 */
include "scripts.php";
include "db.php";
if(!isset($_SESSION['logged_in']))
{
    header('location:dashboard.php');
}
class Logout{


    public function __construct()
    {
        $this->logout_user();
    }

    public function logout_user()
    {
        if(isset($_SESSION['logged_in']))
        {
            session_unset($_SESSION['logged_in']);
            session_destroy();
            return header('location:index.php');
        }
    }

}

$logout = new Logout();
$logout->logout_user();

