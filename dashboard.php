<?php
/**
 * Created by Salman Zafar.
 * User: salman
 * Date: 11/13/2017
 * Time: 3:58 PM
 */


include "scripts.php";
include "db.php";
if(!isset($_SESSION['logged_in'])){
    header("location:index.php");
}
?>

<nav class="navbar-inverse">
    <a href="logout.php" class="alert alert-danger float-right">Logout</a>

</nav>

<h1>
    <?php
      echo $_SESSION['logged_in'];
    ?>

</h1>

