<div class="span10 well" ng-app="timeSheetApp">
  <div ng-controller="TimeSheetCtrl">
    <div class="row-fluid"><?php $this->load->view('timesheetform', $timesheet); ?></div>
    <div class="row-fluid"><?php $this->load->view('timesheetLists', $timesheet); ?></div>
  </div>
</div>
<div class="span2">


</div>
