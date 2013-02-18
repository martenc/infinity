var projectView = angular.module('projectView', []);

projectView.factory('sharedProjects', ['$http', '$rootScope', function($http, $rootScope) {
	var projects = []; // init

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