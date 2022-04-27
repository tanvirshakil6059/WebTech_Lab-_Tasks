<?php 
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: dashboard.php");
    }
?>


<div class="welcome-content" style="padding: 100px 0;">
    <div class="container text-center fs-5">
        <p>Welcome to login page</p>
    </div>
</div>

<div class="form-content py-5">
    <div class="container text-start" style="width: 40%;">
        <form action="../controls/login-control.php" method="POST" class="container">

            <div class="form-group row">
                <label for="staticUsername" class="col-sm-2 col-form-label">Username: </label>
                <div class="col-sm-10">
                    <input type="text" id="staticUsername" class="form-control-plaintext" name="username"><br>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="staticPassword" class="col-sm-2 col-form-label">Password: </label>
                <div class="col-sm-10">
                <input type="password" id="staticPassword" class="form-control-plaintext" name="password"><br>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="r-me" value="t" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">Remember me</label>
            </div>

            <!-- <input type="checkbox" name="r-me" value="t">  <br> -->
            <hr>
            <input type="submit" class="btn btn-primary" value="Login" name="log">
        </form>
        <a href="/Lab-task-6/index.php">Back</a>
    </div>
</div>