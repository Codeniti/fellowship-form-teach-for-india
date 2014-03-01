function disableInputs() {
    $('.disabled, .disabled > input, .disabled > textarea').attr('disabled', 'disabled');
}

$(document).ready(function() {
    
    /*$(document).on('focus', 'input, textarea', function() {
        if(!$(this).parent('.input-group').hasClass('disabled')) {
            $(this).parent('.input-group').addClass('input-selected');
        }
        
        if(!$(this).hasClass('disabled')) {
            $(this).addClass('input-selected');
        }
    });
    $(document).on('blur', 'input, textarea', function() {
        if(!$(this).parent('.input-group').hasClass('disabled')) {
            $(this).parent('.input-group').removeClass('input-selected');
        }
        
        if(!$(this).hasClass('disabled')) {
            $(this).removeClass('input-selected');
        }
    });*/
    
    disableInputs();
    
});