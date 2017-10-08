$(document).ready(function () {
    $("#onclick").click(function () {
        $("#contactdiv").css("display", "block");
        $("#year").val($("#year option:first").val());
        $("#name").focus();
    });
    $("#contact #cancel").click(function () {
        $("#name").val("");
        $("#year").val($("#year option:first").val());
        $("#month").val("01");
        $(this).parent().parent().hide();
        $("#alert").remove();
    });
    
// Contact form popup send-button click event.
    $("#send").click(function () {
        var name = $("#name").val();
        if(name == ""){
            if(!$("#invalidName p").length){
                $("#invalidName").append('<p class="alert-danger" id="alert">You need to enter a valid name</p>');
            }
            $("#name").focus();
        }else{
            $('#contact').submit();
        }
//        var year = $( "#year option:selected" ).text();
//        var month = $( "#month" ).val();
//        
//        alert('Nombre: ' + name);
//        alert('Año: ' + year);
//        alert('Mes: ' + month);
//        
        
    });
});