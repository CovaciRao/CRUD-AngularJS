var URL = "http://localhost/proj";
app.controller('DepartamenteController', function($scope,$http){
 
  $scope.data = [];

  getResultsPage();

  function getResultsPage() {
    $http({
      url: URL + '/api/getDataDep.php',
      method: 'GET'
    }).then(function(res){
      $scope.data = res.data.data;
    });
  }
  
  $scope.saveAdd = function(){
    $http({
      url: URL + '/api/adddep.php',
      method: 'POST',
      data: $scope.form
    }).then(function(data){
      $scope.data.push(data.data);
      $(".modal").modal("hide");
    });
  }

  $scope.edit = function(id){
    $http({
      url: URL + '/api/editdep.php?id='+id,
      method: 'GET'
    }).then(function(data){
      $scope.form = data.data;
    });
  }

  $scope.saveEdit = function(){
    $http({
      url: URL + '/api/updatedep.php?id='+$scope.form.id,
      method: 'POST',
      data: $scope.form
    }).then(function(data){
      $(".modal").modal("hide");
        $scope.data = apiModifyTable($scope.data,data.data.id,data.data);
    });
  }

  $scope.remove = function(post,index){
    var result = confirm("Vrei sa stergi departamentul?");
   	if (result) {
      $http({
        url: URL + '/api/deletedep.php?id='+post.id,
        method: 'DELETE'
      }).then(function(data){
        $scope.data.splice(index,1);
      });
    }
  }
  
   
});