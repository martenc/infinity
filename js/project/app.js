projectView.controller('projViewCtrl', function($scope, sharedProjects) {
	$scope.name = 'project view controller';
	
	sharedProjects.getProjects().then(function(projects) {
    $scope.projects = projects;
    //console.log($scope.projects);
  });

  $scope.$on('handleProjectsBroadcast', function(event, projects) {
    $scope.projects = projects;
  });
  
});

projectView.controller('projAddCtrl', function($scope, sharedProjects) {
  $scope.validation = "";
  $scope.saveProject = function(projectName) {
    if (projectName) {
      $scope.validation = "success";
      $params = $.param({
        "project_name" : projectName,
        "project_client" : 1
      });
      sharedProjects.addProjects($params).then(function() {
        console.log('Project added');
      });
    } else {
      $scope.validation = 'error';
    }
  }
});