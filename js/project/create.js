$(document).ready(function() {

    //save timesheed entry
    $('#save-project').click(function() {
        var projectParams = ['project-name', 'project-client'];
        var projectValues = {};
        $.each(projectParams, function( key, value ) {
           projectValues[value.replace('-', '_')] = $('.project-detail-wrapper #'+value).val();
        });

        save_project(projectValues);
        clear_project_form_inputs(projectParams);
    });

});

function save_project(saveValues) {
    $.ajax({
        type: "POST",
        url: base_url + 'project/save',
        data: saveValues
    })
     .done(function() {
        });

    console.log(saveValues);

}

function clear_project_form_inputs(clearParams) {
    $.each( clearParams, function( key, value ) {
        $('.project-detail-wrapper #'+value).val('');
    });

}