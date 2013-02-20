// adding the shared client list
projectModel.factory('sharedClients', ['$http', '$rootScope', function($http, $rootScope) {
  var clients = []; // init

  return {
    getClients: function() {
      return $http.get(base_url + 'clients/getjson').then(function (response) {
        clients = response.data;
        $rootScope.$broadcast('handleClientBroadcast', clients);
        return clients;
      });
    },
    addClients: function($params) {
      return $http({
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: base_url + 'clients/savejson',
        method: "POST",
        data: $params,
      })
        .success(function(addData) {
          clients = addData;
          $rootScope.$broadcast('handleClientBroadcast', clients);
        });
    }
  };
}]);