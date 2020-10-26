var app =  angular.module('main-App',['ngRoute']);
app.config(['$routeProvider',
    function($routeProvider) {
		$routeProvider
			.when('/', {
			templateUrl: 'templates/home.html',

			})

	        .when('/bir', {
	            templateUrl: 'templates/birouri.html',
	            controller: 'BirouriController'
			})

			.when('/departamente', {
				templateUrl : 'templates/departamente.html',
				controller  : 'DepartamenteController'
			})
			.when('/salariati', {
	            templateUrl: 'templates/salariati.html',
	            controller: 'SalariatiController'
			})
			.when('/salarii', {
	            templateUrl: 'templates/salarii.html',
	            controller: 'SalariiController'
			})
			.when('/bfd', {
	            templateUrl: 'templates/bfromd.html',
	            controller: 'BfromDController'
			});
}]);