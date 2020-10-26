

<?php
   session_start();
   
   ?>
<!DOCTYPE html>
<html>
   <head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Angular JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular-route.min.js"></script>
      <style>
         .form_style
         {
         width: 600px;
         margin: 0 auto;
         }
      </style>
   </head>
   <body>
      <br />
      <br />
      <div ng-app="login_register_app" ng-controller="login_register_controller" class="container form_style">
         <?php
            if(!isset($_SESSION["username"]))
            {
            ?>
         <div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
            <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
            {{alertMessage}}
         </div>
         <div class="panel panel-default" ng-show="login_form">
            <div class="panel-heading">
               <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
               <form method="post" ng-submit="submitLogin()">
                  <div class="form-group">
                     <label>Enter Your Email</label>
                     <input type="text" name="email" ng-model="loginData.email" class="form-control" />
                  </div>
                  <div class="form-group">
                     <label>Enter Your Password</label>
                     <input type="password" name="password" ng-model="loginData.password" class="form-control" />
                  </div>
                  <div class="form-group" align="center">
                     <input type="submit" name="login" class="btn btn-primary" value="Login" />
                     <br />
                     <input type="button" name="register_link" class="btn btn-primary btn-link" ng-click="showRegister()" value="Register" />
                  </div>
               </form>
            </div>
         </div>
         <div class="panel panel-default" ng-show="register_form">
            <div class="panel-heading">
               <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
               <form method="post" ng-submit="submitRegister()">
                  <div class="form-group">
                     <label>Enter Your Name</label>
                     <input type="text" name="username" ng-model="registerData.username" class="form-control" />
                  </div>
                  <div class="form-group">
                     <label>Enter Your Email</label>
                     <input type="text" name="email" ng-model="registerData.email" class="form-control" />
                  </div>
                  <div class="form-group">
                     <label>Enter Your Password</label>
                     <input type="password" name="password" ng-model="registerData.password" class="form-control" />
                  </div>
                  <div class="form-group" align="center">
                     <input type="submit" name="register" class="btn btn-primary" value="Register" />
                     <br />
                     <input type="button" name="login_link" class="btn btn-primary btn-link" ng-click="showLogin()" value="Login" />
                  </div>
               </form>
            </div>
         </div>
         <?php
            }
            else
            {
            ?>
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">Welcome to system</h3>
            </div>
            <div class="panel-body">
               <h1>Welcome - <?php echo $_SESSION["username"];?></h1>
               <a href="logout.php">Logout</a>
            </div>
         </div>
         <?php
            }
            ?>
      </div>
   </body>
</html>
<script>
   var app = angular.module('login_register_app', []);
   app.controller('login_register_controller', function($scope, $http){
    $scope.closeMsg = function(){
    $scope.alertMsg = false;
    };
   
    $scope.login_form = true;
   
    $scope.showRegister = function(){
     $scope.login_form = false;
     $scope.register_form = true;
     $scope.alertMsg = false;
    };
   
    $scope.showLogin = function(){
     $scope.register_form = false;
     $scope.login_form = true;
     $scope.alertMsg = false;
    };
   
    $scope.submitRegister = function(){
     $http({
      method:"POST",
      url:"register.php",
      data:$scope.registerData
     }).then(function(data){
      $scope.alertMsg = true;
      if(data.data.error != '')
      {
       $scope.alertClass = 'alert-danger';
       $scope.alertMessage = data.data.error;
      }
      else
      {
       $scope.alertClass = 'alert-success';
       $scope.alertMessage = data.data.message;
       $scope.registerData = {};
      }
     });
    };
   
    $scope.submitLogin = function(){
	 $http({
      method:"POST",
      url:"login.php",
      data:$scope.loginData
     }).then(function(data){
		  $scope.alertMsg = true;
      if(data.data.error != '')
      {
		  //console.log(data.header.error);
       $scope.alertClass = 'alert-danger';
       $scope.alertMessage = data.data.error;
      }
      else
      {
		  // console.log(data.header.error);
        window.location.replace("http://localhost/proj/index.php#/");
      }
     });
    };
   
   });
</script>

