
    $("#onclick").click(function () {
        $("#contactdiv").css("display", "block");
        $("#year").val($("#year option:first").val());
        $("#name").focus();
    });
    
    // Cancel button from Create New Calendar Form
    $("#contact #cancel").click(function () {
        $("#name").val("");
        $("#year").val($("#year option:first").val());
        $("#month").val("01");
        $(this).parent().parent().hide("fade");
        $("#alert").remove();
    });
    
    // Create new Calendar form popup send-button click event.
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
    });
    
    
   $('.btn-delete').click(function(e){
        
        e.preventDefault();
        
        var row = $(this).parents('tr');
        var rowCount = $('#calendarsTable tr').length;
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID', id);
        var data = form.serialize();
        
        $.post(url, data, function(result){
            
            row.fadeOut();
            row.remove();
            
            if(rowCount == 2){
                $("#calendarsTable").remove();
                $("#calendarsShow").append("You haven't created any calendars");
            }
            
        }).fail(function(e){
            alert (JSON.stringify(e));
        });
        
    });