<?php
      class Controller {
            //to load the model
            public function model($model){
                  require_once '../app/models/'.$model.'.php';

                  //instentiate the model and it to the controller member variable
                  return new $model();
            }

            //to lode the view
            public function view($view, $data = []){
                  if(file_exists('../app/views/'.$view.'.php')){
                        require_once '../app/views/'.$view.'.php';
                  }
                  else{
                        die('Corresponding view dose not exist!');
                  }
            }
      }
?>