<?php $this->load->helper('form'); ?>

<div class="span9 task-detail-wrapper">

	<div class="top-row row-fluid task-label">You are tracking time for</div>

	<div class="middle-row row-fluid">
		<div class="span6 description-wrapper">
			<?php echo form_input(array('name' => 'description','class' =>'span12', 'id'=>'timesheet-description', 'placeholder' => 'Enter timesheet description')); ?>
		</div>

		<div class="span3 duration-wrapper">
			<?php echo form_input(array('name' => 'duration', 'id'=>'timesheet-duration')); ?>
		</div>

		<div class="span3">
			<?php echo form_button(array('name' => 'button',  'content' => 'Save', 'class' => 'btn', 'id' => 'save-timesheet')); ?>
		</div>
	</div>

	<div class="last-row row-fluid">
		<div class="span4">
			<div class="project-wrapper">
				<div class="inputbox">
					<?php echo form_dropdown('project', $form['projects'], '', 'id="timesheet-project"'); ?>
				</div>
				<div class="desc"><div>Project (optional)</div><div><?php print anchor('project/create', 'Create Project'); ?></div></div>
			</div>
		</div>

		<div class="span4">
			<div class="time-container row-fluid">
				<div class="span4">
					<div class="inputbox"><?php echo form_input(array('name' => 'created', 'class' => 'span12', 'id'=>'timesheet-started')); ?></div>
					<div class="desc">START</div>
				</div>
				<div class="span4">
					<div class="inputbox"><?php echo form_input(array('name' => 'ended', 'class' => 'span12', 'id'=>'timesheet-ended')); ?></div>
					<div class="desc">STOP</div>
				</div>
				<div class="span4">
					<div class="inputbox"><?php echo form_input(array('name' => 'date', 'class' => 'span12', 'id' => 'timesheet-date')); ?></div>
					<div class="desc">DATE</div>
				</div>
			</div>
		</div>


		<div class="span4">
			<div class="timesheet-actions">
			</div>
		</div>

	</div>
		
</div>
