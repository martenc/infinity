var timeSheetApp = angular.module('timeSheetApp', ['ui.bootstrap']);

timeSheetApp.factory('sharedProjects', ['$http', '$rootScope', function($http, $rootScope) {
  var projects = [];

  return {
    getProjects: function() {
      return $http.get(base_url + 'project/getjson').then(function (response) {
        projects = response.data;
        $rootScope.$broadcast('handleProjectsBroadcast', projects);
        return projects;
      });
    },
    addProjects: function($params) {
      return $http({
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: base_url + 'project/savejson',
        method: "POST",
        data: $params,
      })
      .success(function(addData) {
        projects = addData;
        $rootScope.$broadcast('handleProjectsBroadcast', projects);
      });
    }
  };
}]);

timeSheetApp.controller('TimeSheetCtrl', function( sharedProjects,$scope, $dialog) {
  $scope.openProjectAddDialog = function(){
    $scope.opts = {
      templateUrl: base_url + 'project/createpopup',
      //this popup will listen to only following controller
      controller: 'ProjectDialogController'
    };
    var d = $dialog.dialog($scope.opts).open();
  };

  sharedProjects.getProjects().then(function(projects) {
    $scope.projects = projects;
  });

  $scope.$on('handleProjectsBroadcast', function(event, projects) {
    $scope.projects = projects;
  });

});


// the dialog is injected in the specified controller
function ProjectDialogController($scope, dialog, sharedProjects){
  $scope.addProject = function() {
    $params = $.param({
      "project_name" : $scope.projectName,
      "project_client" : $scope.projectClient
    });
    sharedProjects.addProjects($params);
    dialog.close();
  };

  $scope.cancelProject = function() {
    dialog.close();
  };
}






$(document).ready(function() {

	//save timesheed entry
	$('#save-timesheet').click(function() {
		var timesheetParams = ['timesheet-description', 'timesheet-project', 'timesheet-duration', 'timesheet-started', 'timesheet-ended'];
		var timesheetValues = {};
		$.each( timesheetParams, function( key, value ) {
			timesheetValues[value.replace('-', '_')] = $('.task-detail-wrapper #'+value).val();
		});
		//save_timesheet(timesheetValues);
		clear_form_inputs(timesheetParams);
	});

});

function save_timesheet(saveValues) {
	$.ajax({
		type: "POST",
		url: base_url + 'timesheet/save',
		data: saveValues
	})
	.done(function() {
	});

    console.log(saveValues);

}

function clear_form_inputs(clearParams) {
	$.each( clearParams, function( key, value ) {
		$('.task-detail-wrapper #'+value).val('');
	});

}