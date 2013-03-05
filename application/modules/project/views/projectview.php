<div class="content-inner-padding" ng-app="projectModel">

	<div class="row-fluid">
    <div class="span12"><h3>List of projects</h3></div>
	</div>

	<div class="row-fluid">
    <div class="span6">
      <div>
        <div ng-view></div>
      </div>
    </div>

    <div class="span4 pull-right control-group {{ validation }}" ng-controller="projAddCtrl">
      <label for="project">Project name:</label>
      <input type="text" ng-model="projectname" name="project" id="project">
      <label></label>
      <select name="client" id="client" ng-model="clientselected">
        <option value="0">SELECT CLIENT</option>
        <option value="{{client.cid}}"
            ng-repeat="client in clientlist">{{client.name}}</option>
      </select>
      <label></label>
      <button class="btn btn-primary" ng-click="saveProject(projectname, clientselected)">Save Project</button>
    </div>

  </div>

</div>
