$(document).ready(function(){
    $("#genererPDFEn").click(function(){
        html2canvas($('#calendar')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 700,
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("calenrierEn.pdf");
                    }
                });   
    });
   
});