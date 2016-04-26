



var myApp = angular.module('angularApp',['youtube-embed','ngRoute','ui','720kb.socialshare']);



myApp.controller('mainController',function($scope,$http,$sce, $anchorScroll,$location,$routeParams,$filter,$log){
	
	
	
	// this is where the JSON from api.php is consumed
    $http.get('connectPDO.php'
).
        success(function(data) {
            // here the data from the api is assigned to a variable named artists
			//$scope.mySearch = null;
            $scope.artists = data;
			$scope.limit = 12;
		    $scope.x = '- datePosted';
			$scope.vid = data[20].URL;
			
            $scope.topVid = $sce.trustAsResourceUrl($scope.vid);
			
			$scope.formData = {};
            
			$scope.processForm = function() {
				$scope.myArray = $scope.formData.search.split(" ");  
				console.log($scope.mySearch);
           };
		   
		   $scope.findGenre = function(genre){
			   $scope.genre = genre;
			   console.log($scope.genre);
			   $scope.mySearch = "";
		   }
		   
		   
		    $scope.y = $routeParams.URL;
		    //$scope.topVid2 = $routeParams.URL;
			
			
            console.log($scope.topVid);
  
		   $scope.changeVid = function(artist){
           
			   $scope.topVid = $sce.trustAsResourceUrl(artist.URL);
			   $scope.topTitle = artist.name;
			   $scope.topArtist = artist.artist;
			   $scope.topCoverArtist = artist.coverArtist;
			   $scope.topAdder = artist.addedBy;
			   $scope.topDate = artist.datePosted;
			   $scope.topGenre = artist.genreName;
			   if($scope.topGenre == "Pop"){
				   $scope.genreURL = 'popPage.html';
			   }
			   
    };
	
	
	
	      $scope.hideVideo = false;
		  $scope.showVideo = false;
		$scope.playerChange = function (){
		  $scope.showVideo = true;
		  $scope.hideVideo = true;
		  };
		  
		  
		  console.log ($scope.showVideo);
		  
		  
		  
		  
		  
		  
		  $scope.gotoTop = function ()	{
			  $location.hash('name-group');
			  $anchorScroll();
			  
		  }  ; 
		  $scope.gotoResults = function ()	{
			  $location.hash('results');
			  $anchorScroll();
			  
		  }  ;
		  
          
   
 
  
  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');

  

});



});



myApp.config( ['$routeProvider', function($routeProvider) {
		$routeProvider
			
			.when('/:URL', {
				//templateUrl: 'video.html',
				controller: 'mainController'
			})
			.otherwise({
				redirectTo: '/'
			});
	}]);


	
	
	myApp.controller('formController',['$scope', '$http', '$log','fileUpload','$anchorScroll','$location','$window', function($scope,$http,$log,fileUpload,$anchorScroll,$location,$window){
	
	
	// this is where the JSON from api.php is consumed
    $http.get('./connectPDO2.php').
        success(function(data) {
            // here the data from the api is assigned to a variable named artists
			//$scope.mySearch = null;
            $scope.artists = data;
			$scope.artistIdent = 1;
			$scope.changeAid = function(){
           
			 $scope.artistIdent = 10;
			 $scope.selected = $scope.artists[0];
			 console.log($scope.selected);
			   
        };
	
	
    })  ;
	$scope.image = "";
	
            $scope.uploadFile = function(){
               var file = $scope.myFile;
               
               console.log('file is ' );
               console.dir(file);
               
               var uploadUrl = "upload.php";
               fileUpload.uploadFileToUrl(file, uploadUrl);
			   
            };
			
	
	$scope.logFile = function (){
		console.log($scope.myFile.name);
	}
   
    
	
	$scope.colors =['red'];
	
	$scope.myObject = new Object();
	$scope.pushData = function($params){
		if (typeof $params.originalArtist != 'undefined') {
			$scope.myObject.originalArtist = $params.originalArtist.a_id;
    
}

if (typeof $params.song != 'undefined') {
			$scope.myObject.song = $params.song.id;
}
    $scope.myObject.newArtist = $params.newArtist;
	$scope.myObject.coverArtist = $params.coverArtist;
	$scope.myObject.URL = $params.URL;
	$scope.myObject.thumbnail = $scope.myFile.name;
	$scope.myObject.genre = $params.genre.g_id;
	$scope.myObject.newSong = $params.newSong;
	$scope.myObject.email = $params.email;
	$scope.myObject.username = $params.username;
	
	
	
		
		$log.info($scope.myObject.thumbnail);
		
		$http.post('insertData.php',$scope.myObject)
		     .success(function(data){
				 $log.info(data);
				 $scope.form = {};
				 alert('Your Video Has been Uploaded!'+ )
				// $scope.submitForm()
			 })
		     .error(function(err){
				 $log.error(err)
			 })
			 
	};
	
  $scope.gotoTop = function ()	{
			  $window.location.reload();
		  }  ; 
	
	$scope.submitForm = function(){
  if($scope.myForm.$valid == true) {
   $scope.gotoTop();
   $location.hash('results');
			  $anchorScroll();
	$log.info('Im working');
  }
 
};

$scope.working = function(){
	alert('Image uploading');
};
	
   
}]);



myApp.directive('fileModel', ['$parse', function ($parse) {
            return {
               restrict: 'A',
               link: function(scope, element, attrs) {
                  var model = $parse(attrs.fileModel);
                  var modelSetter = model.assign;
                  
                  element.bind('change', function(){
                     scope.$apply(function(){
                        modelSetter(scope, element[0].files[0]);
                     });
                  });
               }
            };
         }]);
 
 
 myApp.service('fileUpload', ['$http', function ($http) {
            this.uploadFileToUrl = function(file, uploadUrl){
               var fd = new FormData();
               fd.append('file', file);
            
               $http.post(uploadUrl, fd, {
                  transformRequest: angular.identity,
                  headers: {'Content-Type': undefined}
               })
               
               .success(function($scope){$scope.message = "Image upload successful, please complete the form";
			   alert($scope.message);
               })
            
               .error(function($scope){$scope.message = "upload failed";
			   console.log($scope.message);
               });
			   
			  
			  
            }
         }]);
		 
		 

		 
myApp.directive('myUpload', [function () {
            return {
                restrict: 'A',
                link: function (scope, elem, attrs) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        scope.image = e.target.result;
                        scope.$apply();
                    }

                    elem.on('change', function() {
                        reader.readAsDataURL(elem[0].files[0]);
                    });
                }
            };
        }]);
 
 myApp.directive('myAdSense', function() {
  return {
    restrict: 'A',
    transclude: true,
    replace: true,
    template: '<div ng-transclude></div>',
    link: function ($scope, element, attrs) {}
  }
})
 


