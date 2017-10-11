// Add video function
    $("#addVideo1").click(function(){
        if(!$("#video").is(":visible")){
            $("#videoDiv").css('visibility','visible');
            
            var video = $('<video />', {
                id: 'video',
                src: "{{ asset('vid/001.mp4') }}",
                autoplay: true,
                type: 'video/mp4',
                loop: false,
                controls: true
            });
            video.appendTo($('#videoDiv'));
            $("#video").css('width','100%');
            $("#video").css('height','100%');
   
            $("#videoTab").trigger("click");
        }else{
            $('#video').attr('src', "{{ asset('vid/001.mp4') }}");
            $("#video")[0].load();
        } 
    });
    
    $("#addVideo2").click(function(){
        if(!$("#video").is(":visible")){
            $("#videoDiv").css('visibility','visible');
            
            var video = $('<video />', {
                id: 'video',
                src: "{{ asset('vid/002.mp4') }}",
                autoplay: true,
                type: 'video/mp4',
                loop: false,
                controls: true
            });
            video.appendTo($('#videoDiv'));
            $("#video").css('width','100%');
            $("#video").css('height','100%');
   
            $("#videoTab").trigger("click");
        }else{
            $('#video').attr('src', "{{ asset('vid/002.mp4') }}");
            $("#video")[0].load();
        } 
    });
    
    $("#addVideo").click(function(){
        if(!$("#video").is(":visible")){
            $("#videoDiv").css('visibility','visible');
            
            var video = $('<video />', {
                id: 'video',
                src: "{{ asset('vid/002.mp4') }}",
                autoplay: true,
                type: 'video/mp4',
                loop: false,
                controls: true
            });
            video.appendTo($('#videoDiv'));
            $("#video").css('width','100%');
            $("#video").css('height','100%');
   
            $("#videoTab").trigger("click");
        }                   
    });
    
    
    
    $("#removeVideo").click(function(){
        if($("#video").is(":visible")){
            $("#video").remove();
            $("#calendarTab").trigger("click");
        }
    });