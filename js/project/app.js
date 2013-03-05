projectModel.controller('projViewCtrl', function($scope, sharedProjects, $routeParams) {
	$scope.name = 'project view controller';
	$scope.projectIdArg = $routeParams.id;
	
	sharedProjects.getProjects().then(function(projects) {
		$scope.projects = projects;
	});

  $scope.$on('handleProjectsBroadcast', function(event, projects) {
    $scope.projects = projects;
  });
  
});

projectModel.controller('projectSingleEdit', function($scope, sharedProjects, $routeParams) {
  $scope.name = 'Single edit';
  $scope.projectID = $routeParams.id;

  sharedProjects.getProjects().then(function(projects) {
    $scope.project = [];
    $scope.projects = projects;
    for (i=0; i<projects.length; i++) {
      if (projects[i]['pid'] == $scope.projectID) {
        $scope.project = projects[i];
      }
    }
  });

  $scope.saveNewProject = function(project) {
    $params = $.param({
      "pid": project.pid,
      "name": project.projectname
    })
    sharedProjects.editProject($params);
  }

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