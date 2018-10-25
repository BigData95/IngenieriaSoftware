<!DOCTYPE html>
<html>
 <head>
   <title>Login CodeIgniter</title>
 </head>
 <body>
   <h1>Login con CodeIgniter</h1>

     <?php
    if (isset($logout_message)) {
        echo "<div class='message'>";
        echo $logout_message;
        echo "</div>";
    }
    ?>
   <?php echo validation_errors(); ?>
   <?php 
    // Va al controlador y busca el método user_login_process

    echo form_open('login/user_login_process');

    ?> <label for="username">Username:</label> <input type="text" size="20" id="username" name="username"/> <br/> 
    <label for="password">Password:</label> <input type="password" size="20" id="passowrd" name="password"/> <br/>
    <input type="submit" value="Login"/> </form> </body> </html>