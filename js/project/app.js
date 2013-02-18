projectView.controller('projViewCtrl', function($scope, sharedProjects) {
	$scope.name = 'project view controller';
	
	sharedProjects.getProjects().then(function(projects) {
    $scope.projects = projects;
    console.log($scope.projects);
  });

  $scope.$on('handleProjectsBroadcast', function(event, projects) {
    $scope.projects = projects;
  });
  
});