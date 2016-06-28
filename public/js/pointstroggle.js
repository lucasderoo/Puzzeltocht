$(document).ready(function(){
    $('#pointstoggles').change(function(){
        if(this.checked)
            $('#pointsinput').fadeIn('slow');
        else
            $('#pointsinput').fadeOut('slow');
    });
});