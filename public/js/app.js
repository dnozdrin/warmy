$(function(){
    $(".timepicker").timeDropper({
        format: 'HH:mm:00',
        meridians: false,
        setCurrentTime: false,
    });
    $('#target_temperature').on('input', function () {
        $('#t_value').text($(this).val());
    });
});
