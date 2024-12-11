<?php
      class Users extends Controller{
            public function __construct(){
                 $this->userModel = $this->model('M_Users');
            }
            public function register(){
                 if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  //FORM IS SUBMITED
                  //FORM VALIDATE 
                  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                  //INPUT DATA
                  $data = [
                        'profile_image' => $_FILES['profile_image'],
                        'profile_image_name' => time().'_'.$_FILES['profile_image']['name'],
                        'name' => trim($_POST['name']),
                        'email' => trim($_POST['email']),
                        'password' => trim($_POST['password']),
                        'confirm_password' => trim($_POST['confirm_password']),

                        'profile_image_err' => '',
                        'name_err' => '',
                        'email_err' => '',
                        'password_err' => '',
                        'confirm_password_err' => ''
                  ];

                  //VALIDATE THE DATA
                  //validate profile image and upload 
                  if(uploadImage($data['profile_image']['tmp_name'], $data['profile_image_name'], '/img/profileImgs/')){
                        //done
                  }
                  else{
                        $data['profile_image_err'] = 'Profile picture uploading unsuccessful';
                  }
                  //NAME VAL
                  if(empty($data['name'])){
                        $data['name_err'] = 'Please enter a name';
                  }
                  //EMAIL VAL
                  if(empty($data['email'])){
                        $data['email_err'] = 'Please enter a email';
                  }
                  else{
                        //CHECK EMAIL IS ALRADY REG OR NOT
                        if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'email is already registered';

                        }
                  }    

                  // validate pasword 
                  if (empty($data['password'])){
                        $data['password_err'] = 'Please enter a password';
                 }
                 else if(empty($data['confirm_password'])){
                  $data['confirm_password_err'] = 'Please comform a password';
                 }
                 else{
                  //CHECK PASSWORD MATCHES
                  if($data['password']!= $data['confirm_password']){
                              $data['confirm_password_err'] = 'Password does not match';
                  }
                 }
            
            //validation is completed & no error register sucuss
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['profile_image_err'])){
                  //HASH PASSWORD
                  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                  //REGISTER USER
                  if($this->userModel->register($data)){
                        //SUCCESS
                        // header('location: '. URLROOT. '/users/login');
                        redirect('users/login');
                        
                  }
                  else{
                        die('Something went wrong');
                  }
            }
            else{
                  //Load view
                  $this->view('users/v_register', $data);
            }
      }
      
                 else{
                  //INITIAL FORM
                  $data = [
                        'profile_image' => '',
                        'profile_image_name' => '',
                        'name' => '',
                        'email' => '',
                        'password' => '',
                        'confirm_password' => '',

                        'profile_image_err' => '',
                        'name_err' => '',
                        'email_err' => '',
                        'password_err' => '',
                        'confirm_password_err' => ''
                  ];
                  //LORD VIEW 
                  $this->view('users/v_register', $data);
                 }
            }

            public function login(){
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        //FORM IS SUBMITING
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                        $data = [
                              'email' => trim($_POST['email']),
                              'password' => trim($_POST['password']),

                              'email_err' => '',
                              'password_err' => ''
                        ];

                        //Validate the email
                        if(empty($data['email'])){
                              $data['email_err'] = 'Please enter a email';
                        }
                        else{
                              if($this->userModel->findUserByEmail($data['email'])) {
                                    //User is found

                              }
                              else{
                                    //User is not found
                                    $data['email_err'] = 'User is not found';
                              }
                        }

                        //validate the password
                        if(empty($data['password'])){
                              $data['password_err'] = 'Please enter a password';
                        }

                        //If no error found the login the user
                        if(empty($data['email_err']) && empty($data['password_err'])){
                              // log the user
                              $loggedUser = $this->userModel->login($data['email'],$data['password']);

                              if($loggedUser){
                                    // User the authentication
                                    // Create user session
                                   
                                    $this->createUserSession($loggedUser);

                                    redirect('posts/index');
                                    
                              }
                              else{
                                    $data['password_err'] = 'password incorrect';

                                    //LORD VIEW with errors
                                    $this->view('users/v_login', $data);
                              }
                        }
                        else{
                              //LORD VIEW with errors
                              $this->view('users/v_login', $data);
                        }
                  }
                  else{
                        //INITIAL FORM
                        $data = [
                              'email' => '',
                              'password' => '',

                              'email_err' => '',
                              'password_err' => ''
                        ];

                        //LORD VIEW 
                        $this->view('users/v_login', $data);
                  }
            }
            
            public function createUserSession($user){
                  $_SESSION['user_id'] = $user->id;
                  $_SESSION['user_profile_image'] = $user->profile_image;
                  $_SESSION['user_email'] = $user->email;
                  $_SESSION['user_name'] = $user->name;

                  redirect('pages/index');
            }

            public function logout(){
                  unset($_SESSION['user_id']);
                  unset($_SESSION['user_profile_image']);
                  unset($_SESSION['user_email']);
                  unset($_SESSION['user_name']);
                  session_destroy();

                  redirect('users/login');

            }

            public function isLoggedIn(){
                  if(isset($_SESSION['user_id'])){
                        return true;
                  }
                  else{
                        return false;
                  }
            }
      }
?>