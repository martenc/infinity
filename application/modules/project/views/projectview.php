<div class="content-inner-padding" ng-app="projectView">
	
	<div class="span12"><h3>List of projects</h3></div>

	<div ng-controller="projViewCtrl">
		<table class="table table-bordered table-striped span3">
			<tr>
				<th class="span8">Project Name</th>
				<th class="span4">Client</th>
			</tr>
			<tr ng-repeat="project in projects">
				<th>{{ project.name }}</th>
				<th>{{ project.client }}</th>
			</tr>
		</table>
	</div>

</div>
