<div class="span12 well timesheet-detail-wrapper" >
  <h1>Stuff you've done so far</h1>
  <div ng-repeat='idate in dates'>
    <h1>{{idate.d}}</h1>
    <div ng-repeat="timeSheet in timeSheets | filter:{date: idate.d} ">
      <div>{{timeSheet.description }}</div>
    </div>
  </div>
</div>