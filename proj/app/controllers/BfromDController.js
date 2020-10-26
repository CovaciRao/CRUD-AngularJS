var URL = "http://localhost/proj";

app.controller('BfromDController', function($scope,$http){
  getResultsPage();
  $scope.birouri = [];
  $scope.selection =[];
  $scope.newarray=[];
  function getResultsPage() {
    $http({
      url: URL + '/api/getDataBfromD.php',
      method: 'GET'
    }).then(function(res){
      
       $scope.data = res.data.data;
      let index=0;
      $scope.newarray[0] = {
        departament:'',
        birouri:''
      }
     

      const cartof2 = res.data.data.map((depart) => ({
        departament: depart.departamente_title,
                      
      }));
      console.log(cartof2);

      const ardepart = Array.from(new Set(cartof2.map((c) => c.departament).sort()));
      const mapDep = ardepart.map((depart) => ({
        departament: depart,
        departamentID: Array.from(new Set( res.data.data.filter((departsu) => departsu.departamente_title === depart).map((departsu) => departsu.departID))).toString(),
        birouri: res.data.data.filter((birouiurile) => birouiurile.departamente_title === depart).map((birouiuru) => ( birouiuru.birouri_title )).join(' ')
      }));

      $scope.newarray = mapDep;
    });
  }
 
  $scope.saveAdd = function(){
    getResultsPage();
    console.log('asdasda',$scope.birouri.filter((birou) => birou.selected === true));
    // console.log('depart', $scope.form.departament);
    $http({
      url: URL + '/api/addBfromD.php',
      method: 'POST',
      data: {
        birouri: $scope.birouri.filter((birou) => birou.selected === true),
        // numeDepartmanent: $scope.departul,
        idDepartament: $scope.iddepartul,
      },
    }).then(function(data){
      console.log('cev',data);
      getResultsPage();
    })
    
  }
  $scope.saveAddDeprt = function(){
    $http({
      url: URL + '/api/adddep.php',
      method: 'POST',
      data: $scope.departul
    }).then(function(data){
      console.log('id-ul inserat', data);
      $scope.iddepartul = data.data;
      // getResultsPage();
      $scope.saveAdd();
    });
  }

  $scope.edit = function(id){
    $http({
      url: URL + '/api/editBfromD.php?departament_id='+id,
      method: 'GET'
    }).then(function(data){
      $scope.form = data.data.data;  
      $scope.id=id;
      //console.log('scopform',$scope.form);
      
      angular.forEach($scope.form, function(itm){ 
        if (itm.selected == "TRUE") {
          itm.selected = true;
        } 
        if (itm.selected == "FALSE") {
          itm.selected = false;

        } 
      }); 
     
    
    
    });
  }

  $scope.saveEdit = function(){
    //console.log('thf',$scope.id);
    $http({
      url: URL + '/api/updateBfromD.php?id='+$scope.id,
      method: 'POST',
      data: $scope.form
    }).then(function(data){
      getResultsPage();
    //  console.log('daaa',$scope.form);
    });
  }

  $scope.saveEditDepart = function(){
  //  console.log('titk',$scope.ceva);
    $http({
      url: URL + '/api/updatedep.php?id='+$scope.id,
      method: 'POST',
      data: $scope.ceva
    }).then(function(data){
      getResultsPage();
    });
  }
  $scope.remove = function(post,index){
    var result = confirm("Vrei sa stergi biroul?");
   	if (result) {
      $http({
        url: URL + '/api/deleteBfromD.php?id='+post,
        method: 'DELETE'
      }).then(function(data){
         $scope.data.splice(index,1);
         getResultsPage();
      });
    }
  }
  $scope.loadDepart = function(){  
    $http.get(URL + "/api/getDataDep.php")  
    .then(function(data){  
         $scope.departament = data.data.data;  
    })  
} 
$scope.loadBirt = function(){  
  $http.get(URL + "/api/getData.php")  
  .then(function(data){  
       $scope.birou = data.data.data;  
  })  
} 
$scope.loadBirourile = function(){ 
  $http.get(URL + "/api/getData.php")  
  .then(function(data){  
    let biroiu =[];
      for (let index = 0; index < data.data.data.length; index++) {
       
        let biroucuSelect = data.data.data[index];
        biroucuSelect.selected = false;
        biroiu.push(biroucuSelect);       
      }
       $scope.birouri = biroiu;
 //      console.log(biroiu);
  }) 
}

$scope.$watch('birouri|filter:{selected:true}', function (nv) {
  $scope.selection = nv;
}, true);
});