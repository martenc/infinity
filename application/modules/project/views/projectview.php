<div class="content-inner-padding" ng-app="projectModel">
	
	<div class="row-fluid">
    <div class="span12"><h3>List of projects</h3></div>
	</div>

	<div class="row-fluid">
    <div class="span6">
      <div ng-controller="projViewCtrl">
        <table class="table table-bordered table-striped">
          <tr class="info">
            <td><strong>Project Name</strong></td>
            <td><strong>Client</strong></td>
          </tr>
          <tr ng-repeat="project in projects">
            <td>{{ project.name }}</td>
            <td>{{ project.client }}</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="span4 pull-right control-group {{ validation }}" ng-controller="projAddCtrl">
      <label for="project">Project name:</label>
        <input type="text" ng-model="projectname" name="project" id="project">
      <label></label>
        <button class="btn btn-primary" ng-click="saveProject(projectname)">Save Project</button>
    </div>

  </div>

</div>
