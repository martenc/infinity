<div ng-controller="projectSingleEdit">
  <label for="projectname">Project Name:</label>
  <input type="text" id="projectname" value="" ng-model="project.projectname">

  <label></label>
  <button class="btn btn-success" ng-click="saveNewProject(project)">Save</button>
  <?php echo anchor('project/view#view','Back', 'class="btn"') ?>
<!--  <p>{{project}}</p>-->
</div>