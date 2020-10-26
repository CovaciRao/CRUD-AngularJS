<!DOCTYPE html>
<html lang="en">

<head>


	<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Angular JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular-route.min.js"></script>

	<!-- My App -->
	<script src="app/routes.js"></script>
	<script src="app/helper/myHelper.js"></script>

	<!-- App Controller -->
	<script src="app/controllers/BirouriController.js"></script>
	<script src="app/controllers/DepartamenteController.js"></script>
	<script src="app/controllers/SalariatiController.js"></script>
	<script src="app/controllers/SalariiController.js"></script>
	<script src="app/controllers/BfromDController.js"></script>	


</head>

<body ng-app="main-App">

<nav class="navbar navbar-default">
      <div class="navbar-header">
        <a class="navbar-brand" href="/">logout</a>
	  </div>
	  <div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#!"><i class="fa fa-home"></i> Home</a></li>
        <!-- <li><a href="#!departamente"><i class="fa fa-shield"></i> Departamente</a></li> -->
		<li><a href="#!bir"><i class="fa fa-comment"></i> Birouri</a></li>
		<li><a href="#!salariati"><i class="fa fa-comment"></i> Salariati</a></li>
		<li><a href="#!salarii"><i class="fa fa-comment"></i> Salarii</a></li>
		<li><a href="#!bfd"><i class="fa fa-comment"></i> Birouri din departamente</a></li>

	  </ul>
	</div>	
  </nav>
		<ng-view></ng-view>
	</div>
	
</body>
</html>