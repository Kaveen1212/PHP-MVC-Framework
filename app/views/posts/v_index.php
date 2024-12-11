<!DOCTYPE html>
<html>
      <head>
            <title><?php echo "CityOfDream"; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/index.css">

      </head>

      <body>
<style>
      

      .profile-img img{
            margin-top:20px;
            margin-left:10px;
            padding-left: 10px;
            padding-right: 10px;
            width: 45px;
            height: 45px;
            border-radius: 50%;
      }

      .custom-alert {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin: 10px 0;
            font-family: Arial, sans-serif;
      }


      .heder{
            font-size: 26px;
            margin-top:20px;
            margin-left:10px;
            font-family: Katibeh;
            cursor: pointer;
            color: #fff;
      }

      .post-crete{
            background-color: #7A8DCD;
            padding: 15px;
            font-size: 16px;
            color: white;
            border:none;
            cursor: pointer;
            font-weight: 400;
            transition: .2s all;
            margin-top: 10px;
      }
      .post-crete:hover{
            background-color: #48465C;
            color:#9EAFDF;
      }

      ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            }

      li {
            float: left;
      }

      li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
      }

      .logout{
            background-color: #7A8DCD;
            padding: 10px;
            font-size: 16px;
            color: white;
            border:none;
            cursor: pointer;
            font-weight: 400;
            transition: .2s all;
      }

      .posts-wrapper{
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            padding-top: auto;
      }


      h5{
            color: green;
            font-weight: 600;
            font-size:24px;
      }



      .post-index-container{
            background-color: rgb(18,18,18,255); 
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1); 
            width: 500px; 
            height: auto; 
            border: 1px solid #d3d3d3; 
            color: #a0a0a0;
            /* background-position: center; */
      }

      .post-header{
            padding: 11px; 
            margin-top: 0;
            display: flex; 
            flex-direction: row; 
            gap: 40px;
            font-size: 14px; 
            border-bottom: 1px solid #d3d3d3;
            gap: 15px;
      }

      .post-user-profileimage img{
            height:30px;
            width:30px;
            border-radius: 50%;
      }

      .post-user-name{
            padding-right: auto; 
            font-size: 18px;
            font-weight:600;
      }

      .post-created-at{
            font-weight: 600; 
            color: #3F3F3F;
      }

      .post-control-btns{
            gap:20px;
            display: flex;
      }

      .post-control{
            background-color: rgb(36, 105, 110);
            color: white;
            margin-left: 10px;
            padding: 5px 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            transition: .2s all;
      }

      .post-delete{
            background-color: red;
            color: white;
            margin-left: 10px;
            padding: 5px 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            transition: .2s all;
      }

      .post-index-container .post-body{
            /* padding: 10px;  */
            border-bottom: 1px solid #d3d3d3;
      }

      .post-index-container .post-body .post-image img{
            width: 100%;
            height: 300px;
      }

      .post-index-container .post-title{
            padding-left: 10px;
            padding-right: 10px;
            font-size: 42px; 
            font-weight: 600;
      }
      .post-index-container .post-body-center{
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 10px;
      }

      .post-index-container .post-footer{
            padding: 10px; 
            display: flex; 
            flex-direction: row; 
            font-size: 13px;
            /* gap:10px; */
            font-weight: bold;
      }

      .post-index-container .post-footer img{
            position: relative;
            width: 20px;
            height: 20px;
            padding-left: 10px;
            padding-right: 5px;
      }

      .post-index-container .post-footer .post-likes{
            padding: 10px;
            font-weight: 600;
            color: #1b8800;
            cursor: pointer;
            transition: .2s all;
            display: flex;
            flex-direction: row;
      }

      .post-index-container .post-footer .post-likes.active{
            background-color: #9aeb86;
      }


      .post-index-container .post-footer .post-dislikes{
            padding: 10px;
            font-weight: 600;
            color: #AA0000;
            cursor: pointer;
            transition: .2s all;
            display: flex;
            flex-direction: row;
      }

      .post-index-container .post-footer .post-dislikes.active{
            background-color: #f5a59f;
      }


</style>

<ul>

<div class="user-details">
  <a href=""><li class="profile-img"><img src="<?php echo URLROOT; ?>/img/profileImgs/<?php echo $_SESSION['user_profile_image']; ?>" alt=""></li></a>
  <li><h2 class="heder"><?php echo $_SESSION['user_name']; ?></h2></li>
</div> 
  <li style="float:right"><a href="<?php echo URLROOT?>/users/login">
  <button class="logout">Log Out</button></a></li>
</ul>




      <a href="<?php echo URLROOT?>/posts/create">
      <button class="post-crete">create Post</button></a>

      


<div class="posts-wrapper">

<div class="flash">
    <?php if ($msg = flash('post_msg')) : ?>
        <div class="alert alert-success" role="alert">
            <h5><?php echo $msg; ?></h5>
        </div>
    <?php endif; ?>
</div>

<?php foreach($data['posts'] as $post): ?>

<div class="post-index-container">

      <div class="post-header">
            <div class="post-user-profileimage">
                  <img src="<?php echo URLROOT;?>/img/profileImgs/<?php echo $post->profile_image; ?>" alt="">
            </div>
            <div class="post-user-name">
                  <?php echo $post->user_name; ?></div>

            <div class="post-created-at">
            <?php echo convertTimeToReadableFormat($post->post_created_at); ?></div>

           <?php  ?>

           <?php if($post->user_id == $_SESSION['user_id']): ?>
            <div class="post-control-btns">
                  <a href="<?php echo URLROOT?>/posts/edit/<?php echo $post->post_id; ?>">
                  <button class="post-control">EDIT</button></a>

                  <a href="<?php echo URLROOT?>/posts/delete/<?php echo $post->post_id; ?>">
                  <button class="post-delete">DELETE</button></a>
            </div>

            <?php endif; ?>
            

      </div>
      <div class="post-body">
            <div class="post-image">
                  <?php if($post->image != null): ?>
                        <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $post->image; ?>" alt="">
                  <?php endif; ?>
            </div>
            <div class="post-title"><?php echo $post->title; ?></div>
            <div class="post-body-center"><?php echo $post->body; ?></div>
      </div>
      <div class="post-footer">
            <?php if($post->interaction == 'liked'): ?>
            <div class="post-likes active" id="post-likes-<?php echo $post->post_id; ?>" onclick="addLike(<?php echo $post->post_id; ?>)">
            <?php else: ?>
            <div class="post-likes" id="post-likes-<?php echo $post->post_id; ?>" onclick="addLike(<?php echo $post->post_id; ?>)">
            <?php endif; ?>
                  <img src="<?php echo URLROOT; ?>/img/components/posts/like-btn.png" alt="">
                  <div class="posts-likes-count" id="posts-likes-count-<?php echo $post->post_id; ?>"><?php echo $post->likes; ?></div>
            </div>
            <?php if($post->interaction == 'disliked'): ?>
            <div class="post-dislikes active" id="post-dislikes-<?php echo $post->post_id; ?>" onclick="addDislike(<?php echo $post->post_id; ?>)">
            <?php else: ?>
            <div class="post-dislikes" id="post-dislikes-<?php echo $post->post_id; ?>" onclick="addDislike(<?php echo $post->post_id; ?>)">
            <?php endif; ?>
                  <img src="<?php echo URLROOT; ?>/img/components/posts/dislike-btn.png" alt="">
                  <div class="posts-dislikes-count" id="posts-dislikes-count-<?php echo $post->post_id; ?>"><?php echo $post->dislikes; ?></div>
            </div>
      </div>
</div>

<?php endforeach; ?>
</div>

<!-- jQuery  -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/jQuery/jQuery.js"></script>

<script type="text/JavaScript">
      var URLROOT = '<?php echo URLROOT; ?>'
</script>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/posts/postsInterations.js"></script>



</body>
</html>

