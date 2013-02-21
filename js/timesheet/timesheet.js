var timeSheetApp = angular.module('timeSheetApp', ['ui.bootstrap', 'ui']);

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


timeSheetApp.factory('timeSheetData', ['$http', '$rootScope', function($http, $rootScope) {
  var timeSheetData = [];

  return {
    getTimesheets: function() {
      return $http.get(base_url + 'timesheet/gettsjson').then(function (response) {
        //console.log(response.data);
        timeSheetData = response.data;
        $rootScope.$broadcast('handleTimesheetBroadcast', timeSheetData);
        return timeSheetData;
      });
    },
    addTimeSheet: function($params) {
      return $http({
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: base_url + 'timesheet/savejson',
        method: "POST",
        data: $params,
      })
      .success(function(addData) {
          timeSheetData.timesheets.push(addData.insert);
          $rootScope.$broadcast('handleTimesheetBroadcast', timeSheetData);
      });
    }
  };
}]);



timeSheetApp.controller('TimeSheetCtrl', function( sharedProjects,timeSheetData, $scope, $dialog) {
  //project popup
  $scope.openProjectAddDialog = function(){
    $scope.opts = {
      templateUrl: base_url + 'project/createpopup',
      //this popup will listen to only following controller
      controller: 'ProjectDialogController'
    };
    var d = $dialog.dialog($scope.opts).open();
  };

  //get project lists
  sharedProjects.getProjects().then(function(projects) {
    $scope.projects = projects;
  });

  //update project list if new added
  $scope.$on('handleProjectsBroadcast', function(event, projects) {
    $scope.projects = projects;
  });

  //get all timesheets
  timeSheetData.getTimesheets().then(function(timeSheetData) {
    $scope.timeSheets = timeSheetData.timesheets;
    var dates = [];
    angular.forEach(timeSheetData.allDates, function(value, key){
      dates.push({d:value.date, f:value.flag});
    });
    $scope.dates = dates;

  });


  //update timesheets list if new added
  $scope.$on('handleTimesheetBroadcast', function(event, timeSheetData) {
    $scope.timeSheets = timeSheetData.timesheets;
  });
  //add timesheet todatabase and scope
  $scope.addTimeSheet = function() {

    //format date as per requirement
    if ($scope.timesheetDate){
      var timesheetSelectedDate = $scope.timesheetDate;
    }
    else {
      var timesheetSelectedDate = new Date();
    }
    timeSheetDateFormatted = $.datepicker.formatDate('dd-mm-yy', timesheetSelectedDate);

    $params = $.param({
      "description" : $scope.timesheetDescription,
      "pid" : $scope.timesheetProject,
      "createddate" : timeSheetDateFormatted,
    });


    //change ng-show if its false e.g. first entry for today
    angular.forEach($scope.dates, function(value, key) {
      if (timeSheetDateFormatted == value.d) {
        if(!value.f) $scope.dates[key].f = 1;
      }
    });

    //clear timesheet form
    clearTimesheetForm($scope);

    //add timesheet to database and update scope
    timeSheetData.addTimeSheet($params);
  };
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

/**
 *  clear timesheet form elements.
 * @param $scope
 */
function clearTimesheetForm($scope) {
  $scope.timesheetDescription = '';
  $scope.timesheetProject = "{pid:'not in list'}";
  if ($scope.timesheetDate) {
    $.datepicker._clearDate('#timesheet-date');
  }

}


/*
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
  */