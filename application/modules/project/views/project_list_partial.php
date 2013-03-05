<div ng-controller="projViewCtrl">
  <table class="table table-bordered table-striped">
    <tr class="info">
      <td><strong>Project Name</strong></td>
      <td><strong>Client</strong></td>
      <td></td>
    </tr>
    <tr ng-repeat="project in projects">
      <td>{{ project.projectname }}</td>
      <td>{{ project.clientname }}</td>
      <td><?php echo anchor('project/view#edit/{{ project.pid }}', 'Edit'); ?> / Delete</td>
    </tr>
  </table>
</div>