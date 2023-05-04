//fonction pour incrementation
    var incr1 = (function () {
    var i = 1;

    return function () {
        return i++;
    }})();
(function ($) {
    
    $.fn.pim = function() {
               $("#modalUpdateActu #addtypeFile").click(function() {
                   var a=incr1();
        if(a>=4){
            swal({
                title:"",
                text:" le photo est beaucoup!",
                icon:"warning",
            });
        }else{
            if ($(this).hasClass('add')) {
                $(this).before('<div id="file'+a+'" style="display: flow-root;"><input type="file" name="image'+a+'" style="width: 368px;" /><button class="btn btn-primary btn-danger" type="button" id="remove'+a+'"  style="float: right;" onClick="javascript:remover(`file'+a+'`);"  ><i class="fa fa-remove"></i></button></div>');
            }
        } 
        });     
        
        return this;
    }

}(jQuery));
$("#modalUpdateActu #test div").pim();