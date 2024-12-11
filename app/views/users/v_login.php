<!DOCTYPE html>
<html>
      <head>
            <title><?php echo "CityOfDream"; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo URLROOT;?>/css/register.css">
      </head>

      <body> 

<!--TOP NAVIGATION-->




    
     <div class="container">
        
        <div class="form-container">
            <h1>Dreams Login</h1>
            <form action="<?php echo URLROOT?>/users/login" method="POST">

                <input type="email" name="email" id="email" class="email" placeholder="Enter Your Email" required value="<?php echo $data['email']; ?>">
                <span class="form_invalid"><?php echo $data['email_err']; ?></span>

                <input type="password" name="password" id="password" class="password" placeholder="Enter Your Password" required value="<?php echo $data['password']; ?>">
                <span class="form_invalid"><?php echo $data['password_err']; ?></span>

                <button type="submit">Login</button>

            <div style="display: flex; gap: 10px;">
                <a href="<?php echo URLROOT ?>/users/register"><p>I Don't have an account</p></a>
<p>|</p>
                <a href="<?php echo URLROOT ?>/users/register"><p>Foget password</p></a>
            </div>

            </form>
        </div>
    </div>


</body>
</html>


