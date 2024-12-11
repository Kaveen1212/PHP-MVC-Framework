<!DOCTYPE html>
<html>
      <head>
            <title><?php echo "CityOfDream"; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
      </head>

      <body> 

      <h1>Users</h1>

      <?php foreach($data['users']as $user): ?>
            <p><?php echo $user->name; ?> - <?php echo $user->age; ?></p>
      <?php endforeach; ?>
      
</body>
</html>


