<?php $this->load->helper('form'); ?>
<form ng-submit="addProject()">
<div class="span3 project-detail-wrapper">
  <div class="row-fluid">
    <div class="project-name-wrapper">
      <input type="text" name="project_name" value="" class="span12" id="project-name" ng-model="projectName" placeholder="Enter project name">
    </div>

    <div class="client-name-wrapper">
      <input type="text" name="project_client" value="" class="span12" id="project-client" ng-model="projectClient" placeholder="Enter client name">
    </div>

    <div class="client-create-button">
        <input class="btn-primary btn" type="submit" value="add">
    </div>
  </div>
</div>
</form>