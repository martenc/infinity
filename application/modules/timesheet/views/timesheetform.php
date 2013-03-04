<?php $this->load->helper('form'); ?>

<div class="span12 well task-detail-wrapper" >
  <form ng-submit="addTimeSheet()">
	<div class="top-row row-fluid task-label">You are tracking time for</div>

	<div class="middle-row row-fluid">
		<div class="span9 description-wrapper">
      <input type="text" name="description" ng-model="timesheetDescription" class="span12" id="timesheet-description" placeholder="Enter timesheet description" required>
		</div>

		<div class="span2 duration-wrapper">
			<?php echo form_input(array('name' => 'duration', 'class' =>'span12','id'=>'timesheet-duration')); ?>
		</div>

		<div class="span1">
      <input class="btn-primary span12 btn" type="submit" value="Save" id='save-timesheet'>
		</div>
	</div>

	<div class="last-row row-fluid">
		<div class="span3">
			<div class="project-wrapper">
				<div class="inputbox">
          <select class="span12" name="timesheet-project" ng-model="timesheetProject" ng-options="p.pid as p.projectname for p in projects" required>
            <option value="">-- chose project --</option>
          </select>
				</div>
				<div class="desc clearfix"><div>Project (optional)</div><div><p class="btn btn-link" ng-click="openProjectAddDialog()">create a project</p> </div></div>
			</div>
		</div>

		<div class="span6">
			<div class="time-container row-fluid">
				<div class="span2">
					<div class="inputbox"><input type="text" name="created" value="" class="span12" id="timesheet-started" ng-model="startTime" required></div>
					<div class="desc">START</div>
				</div>
				<div class="span2">
					<div class="inputbox"><input type="text" name="ended" value="" class="span12" id="timesheet-ended" ng-model="endTime" required></div>
					<div class="desc">STOP</div>
				</div>
				<div class="span8">
					<div class="inputbox"><input ng-model='timesheetDate' class='span12', id='timesheet-date' ui-date="{formatDate: 'dd-mm-yy' }" required></div>
					<div class="desc">DATE</div>
				</div>
			</div>
		</div>


		<div class="span3">
			<div class="timesheet-actions">
			</div>
		</div>

	</div>
  </form>
</div>
