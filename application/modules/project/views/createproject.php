<?php $this->load->helper('form'); ?>
<div class="container-fluid">
  <div class="modal-header">
   <h4>Create a new project</h4>
  </div>
  <form ng-submit="addProject()">
    <div class="span3 project-detail-wrapper">
      <div class="modal-body">

        <div class="row-fluid">
          <div class="project-name-wrapper">
            <input type="text" name="project_name" value="" class="span12" id="project-name" ng-model="projectName" required="required" placeholder="Enter project name">
          </div>

          <div class="client-name-wrapper">
            <input type="text" name="project_client" value="" class="span12" id="project-client" ng-model="projectClient" required="required" placeholder="Enter client name (numeric)">
          </div>

          <div class="client-create-button">
            <input class="btn-primary btn" type="submit" value="add">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>