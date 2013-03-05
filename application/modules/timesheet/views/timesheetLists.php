<div class="span12 well timesheet-detail-wrapper" >
  <h1>Stuff you've done so far</h1>
  <div ng-repeat='idate in dates' ng-show="idate.f">
    <h1>{{idate.d}}</h1>
    <div ng-repeat="timeSheet in timeSheets | filter:{date: idate.d} ">
        <div ng-hide="editMode" ng-click="editMode=true;" ng-bind-html="timeSheet.showData">
        </div>
        <div ng-show="editMode">
            <input type="text" ng-model="value" ng-enter="editMode=false"/>
        </div>
    </div>
  </div>
</div>
