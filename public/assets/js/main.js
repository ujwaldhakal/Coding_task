$(document).ready(function () {

    $('.validate-form').submit(function(){
        var formSelector = $(this);
        /* check if mandatory fields are empty */
        isInput = checkIfFieldEmpty( formSelector , 'required');

        if(!isInput ){
            $('.form-error').removeClass('hide');
            return false;
        }
        return true;
    });

    function checkIfFieldEmpty( formSelector, requiredClass ){
        var err = 0 ;
        formSelector.find(':input,select,textarea').each(function(){
            var thisObj = $(this);
            if( thisObj.hasClass(requiredClass)){
                var thisVal = $.trim( thisObj.val() );
                if(thisVal == null || thisVal == '' || thisVal == 'NULL'){
                    thisObj.addClass('val-error');
                    var label = $(this).parent().parent().find('label');
                    thisObj.parent().append('<span class="help-block">*This field is required</span>');
                    err++;
                }
            }
        });
        if( err > 0){
            return false;
        }
        return true;
    }




})