//fonction pour incrementation
    var incr = (function () {
    var i = 1;

    return function () {
        return i++;
    }})();
(function ($) {
    
    $.fn.pim = function() {
               $("#modalAddActu #addtypeFile").click(function() {
                   var a=incr();
        if(a>=4){
            swal({
                title:"",
                text:" le photo est beaucoup!",
                icon:"warning",
            });
        }else{
            if ($(this).hasClass('add')) {
                $(this).before('<div id="file'+a+'" style="display: flow-root;"><input type="file" name="image'+a+'" style="width: 368px;" /><button class="btn btn-primary btn-danger" type="button" id="remove'+a+'"  style="float: right;" onClick="javascript:remove(`file'+a+'`);"  ><i class="fa fa-remove"></i></button></div>');
            }
        } 
        });     
        
        return this;
    }

}(jQuery));
$("#modalAddActu #test div").pim();
