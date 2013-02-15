<?php $this->load->helper('form'); ?>
<div class="span3 project-detail-wrapper">
  <div class="row-fluid">
    <div class="project-name-wrapper">
      <?php echo form_input(array('name' => 'project_name','class' =>'span12', 'id'=>'project-name', 'placeholder' => 'Enter project name')); ?>
    </div>

    <div class="client-name-wrapper">
      <?php echo form_input(array('name' => 'client_name','class' =>'span12', 'id'=>'project-client', 'placeholder' => 'Enter client name')); ?>
    </div>

    <div class="client-create-button">
      <?php echo form_button(array('name' => 'button',  'content' => 'Save', 'class' => 'btn btn-primary', 'id' => 'save-project')); ?>
    </div>
  </div>
</div>