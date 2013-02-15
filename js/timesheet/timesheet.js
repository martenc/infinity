$(document).ready(function() {

	//save timesheed entry
	$('#save-timesheet').click(function() {
		var timesheetParams = ['timesheet-description', 'timesheet-project', 'timesheet-duration', 'timesheet-started', 'timesheet-ended'];
		var timesheetValues = {};
		$.each( timesheetParams, function( key, value ) {
			timesheetValues[value.replace('-', '_')] = $('.task-detail-wrapper #'+value).val();
		});

		save_timesheet(timesheetValues);
		clear_form_inputs(timesheetParams);
	});

});

function save_timesheet(saveValues) {
	$.ajax({
		type: "POST",
		url: base_url + 'timesheet/save',
		data: saveValues
	})
	.done(function() {
	});

    console.log(saveValues);

}

function clear_form_inputs(clearParams) {
	$.each( clearParams, function( key, value ) {
		$('.task-detail-wrapper #'+value).val('');
	});

}