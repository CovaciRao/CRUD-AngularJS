var URL = "http://localhost/proj";
app.controller('SalariatiController', function($scope,$http){
 
  $scope.data = [];

  getResultsPage();

  function getResultsPage() {
    $http({
      url: URL + '/api/getDataSalariat.php',
      method: 'GET'
    }).then(function(res){
      $scope.data = res.data.data;
    });
  }

  $scope.saveAdd = function(){
    $http({
      url: URL + '/api/addSalariat.php',
      method: 'POST',
      data: $scope.form
    }).then(function(data){
      getResultsPage();
      $(".modal").modal("hide");
    });
  }

  $scope.edit = function(id){
    $http({
      url: URL + '/api/editSalariat.php?id='+id,
      method: 'GET'
    }).then(function(data){
      $scope.form = data.data;
    });
  }

  $scope.saveEdit = function(){
    $http({
      url: URL + '/api/updateSalariat.php?id='+$scope.form.id,
      method: 'POST',
      data: $scope.form
    }).then(function(data){
      $(".modal").modal("hide");
        $scope.data = apiModifyTable($scope.data,data.data.id,data.data);
    });
  }

  $scope.remove = function(post,index){
    var result = confirm("Vrei sa stergi biroul?");
   	if (result) {
      $http({
        url: URL + '/api/deleteSalariat.php?id='+post.id,
        method: 'DELETE'
      }).then(function(data){
        $scope.data.splice(index,1);
      });
    }
  }
   
  $scope.loadDep = function(){  
    $http.get(URL + "/api/getDataDep.php")  
    .then(function(data){  
         $scope.departament = data.data.data;  
    })  
}  



$scope.loadBirouDep = function(){ 
  $http.post(URL + '/api/getDatabiroudep.php',{'departament_id':$scope.form.departament})  
  .then(function(data){  
      $scope.birouri =data.data;
   
  });  
}
 $scope.loadDep();
});