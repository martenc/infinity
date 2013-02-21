projectModel.controller('projViewCtrl', function($scope, sharedProjects) {
	$scope.name = 'project view controller';
	
	sharedProjects.getProjects().then(function(projects) {
    $scope.projects = projects;
    console.log($scope.projects);
  });

  $scope.$on('handleProjectsBroadcast', function(event, projects) {
    $scope.projects = projects;
  });
  
});

projectModel.controller('projAddCtrl', function($scope, sharedProjects, sharedClients) {
  $scope.validation = "";

  // get client list
  $scope.clientlist = sharedClients.getClients();

  // save project along with client id
  $scope.saveProject = function(projectName, clientselected) {
    if (projectName && clientselected && clientselected !=0) {
      $scope.validation = "success";
      $params = $.param({
        "project_name" : projectName,
        "project_client" : clientselected
      });
      sharedProjects.addProjects($params);
      $scope.projectname = "";
      $scope.clientselected = 0;
    } else {
      $scope.validation = 'error';
    }
  }

  $scope.selectClient = function(cid) {
    console.log(cid);
  }
});