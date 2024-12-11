<!DOCTYPE html>
<html>
      <head>
            <title><?php echo "CityOfDream"; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/create.css">
      </head>

      <body> 



      <ul>

            <div class="user-details">
                  <a href=""><li class="profile-img"><img src="<?php echo URLROOT; ?>/img/profileImgs/<?php echo $_SESSION['user_profile_image']; ?>" alt=""></li></a>
                  <li><h2 class="heder"><?php echo $_SESSION['user_name']; ?></h2></li>
            </div> 
            <li style="float:right"><a href="<?php echo URLROOT?>/users/login">
            <button class="logout">Log Out</button></a></li>
      </ul>

      <div class="logo">
            <!-- <img src="/public/logo.png" alt="Company Logo" style=" width: 125px;height: 75px; margin-left:0;"> -->
    </div>
    

      <div class="main-container">

            <div class="post-container"> 
            <h1>Post Edit </h1>
            <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post_id']; ?>" method="POST" enctype="multipart/form-data">
                  <div class="post-image">
                        <?php if($data ['image_name'] != null ): ?>
                              <img src="<?php echo URLROOT; ?>/img/postsImgs/<?php echo $data['image_name']; ?>" alt="" id="image_placeholder">
                        <?php else:?>
                              <img src="" alt="" id="image_placeholder" style="display: none;">
                        <?php endif;?>
                  </div>
                  <div class="upper">
                        <div class="left">

                              <input type="text" name="title" id="title" placeholder="Title" value="<?php echo $data['title']; ?>">
                              <span class="form_invalid"><?php echo $data['title_err'];?></span>
                              <span class="form_invalid"><?php echo $data['image_err'];?></span>
                              
                        </div>

                        <div class="right">
                              <img src="<?php echo URLROOT; ?>/img/components/posts/browse-image.png" alt="Upload Image" id="addImageBtn" onclick="toggleBrowse()">
                              <img src="<?php echo URLROOT; ?>/img/components/posts/remove-image.png" alt="Upload Image" id="removeImageBtn" style="display: none;" onclick="removeImage()">
                              <input type="text" name="intentially_removed" id="intentially_removed" style="display: none;" readonly>
                              <input type="file" name="image" id="image" style="display: none;">
                        </div>
                        </div>

                              <textarea name="body" id="body" placeholder="Document" row="10" column="20"><?php  echo $data['body']; ?></textarea>
                              <span class="form_invalid"><?php echo $data['body_err'];?></span>

                              <button type="submit" value="Update" class="post">Update</button>

            </form>
        </div>
      </div>

      <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/posts/posts.js"></script>



</body>
</html>


