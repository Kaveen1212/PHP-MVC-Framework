<!DOCTYPE html>
<html>
      <head>
            <title><?php echo "CityOfDream"; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo URLROOT;?>/css/register.css">
      </head>

      <body> 

    <div class="container">
        
        <div class="form-container">
            <h1>Dreams Register</h1>
            <form action="<?php echo URLROOT ?>/Users/register" method="POST" enctype="multipart/form-data" >

                <!--profile image-->
                <div class="form-drag-area">
                    <div class="icon">
                        <img src="<?php echo URLROOT; ?>/img/components/imageUpload/placeholder-icon.png" alt="placeholder" width="70px" height="70px" id="profile_image_placeholder">
                    </div>
                    <div class="right-content">
                        <div class="description">Drag & Drop to Upload File</div>
                        <div class="form-upload">
                            <input type="file" name="profile_image" id="profile_image"  style="display: none;">
                            Browse File
                        </div>
                    </div>
                </div>
                
                <div class="form-validation">
                        <div class="profile-image-validation">
                            <img src="<?php echo URLROOT; ?>/img/components/imageUpload/green-tick-icon.png" alt="green-tick" width="15px" height="15px">
                            Select a Profile picture
                        </div>
                    </div>

                    <span class="form_invalid"><?php echo $data['profile_image_err'];?></span>

                <input type="text" name="name" id="name" class="name" placeholder="Enter Your Name" required value="<?php echo $data['name']; ?>">
                <span class="form_invalid"><?php echo $data['name_err'];?></span>

                <input type="email" name="email" id="email" class="email" placeholder="Enter Your Email" required value="<?php echo $data['email']; ?>">
                <span class="form_invalid"><?php echo $data['email_err'];?></span>

                <input type="password" name="password" id="password" class="password" placeholder="Enter Your Password" required value="<?php echo $data['password']; ?>">
                <span class="form_invalid"><?php echo $data['password_err'];?></span>

                <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" placeholder="Confirm Your Password" required value="<?php echo $data['confirm_password']; ?>">
                <span class="form_invalid"><?php echo $data['confirm_password_err'];?></span>

                <button type="submit">Register</button>

                <a href="<?php echo URLROOT ?>/users/login"><p>Already I have an account</p></a>
            </form>
        </div>
        </div>
    </div>

    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/imageUpload/imageUpload.js"></script>

</body>
</html>
                        