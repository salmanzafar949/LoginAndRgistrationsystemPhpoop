<?php
/**
 * Created by Salman Zafar.
 * User: Salman
 * Date: 11/13/2017
 * Time: 2:49 PM
 */
include "scripts.php";
include "login.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['email']=$_POST['email'];
    if(isset($_SESSION['email'])) {
        $login = new Login();
        $response = $login->login();
       echo "<div class='alert alert-danger'>";
       echo $response;
       echo "</div>";
    }
}
?>
<form class="form-inline float-right" method="post" action="">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pass" required>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

<div class="container py-8 ">
    <h2 class="text-center pb-2"></h2>
    <div class="row">
        <div class="col-lg-6 col-12 pb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="text-center mb-4">Sign-up</h2>
                    <ul class="list-inline text-center py-2">
                        <li class="list-inline-item px-3"><a href="" title="Twitter"><i class="display-3 ion-social-twitter-outline"></i></a>&nbsp; </li>
                        <li class="list-inline-item px-3"><a href="" title="Google"><i class="display-3 ion-social-googleplus-outline"></i></a>&nbsp; </li>
                        <li class="list-inline-item px-3"><a href="" title="Facebook"><i class="display-3 ion-social-facebook-outline"></i></a></li>
                    </ul>
                    <form role="form" method="post" action="Register.php">
                        <div class="form-group">
                            <label for="input2EmailForm" class="sr-only form-control-label">email</label>
                            <div class="mx-auto col-sm-10">
                                <input type="email" class="form-control" name="email" id="input2EmailForm" placeholder="email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input2PasswordForm" class="sr-only form-control-label">password</label>
                            <div class="mx-auto col-sm-10">
                                <input type="password" class="form-control" name="pass" id="input2PasswordForm" placeholder="password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input2Password2Form" class="sr-only form-control-label">verify</label>
                            <div class="mx-auto col-sm-10">
                                <input type="password" class="form-control" name="pass1" id="input2Password2Form" placeholder="verify password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mx-auto col-sm-10 pb-3 pt-2">
                                <button type="submit" class="btn btn-outline-secondary btn-lg btn-block">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>