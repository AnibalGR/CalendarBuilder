/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Render Image from Calendar    
$('#saveImage').click(function () {
    html2canvas($('#calendarPanel'), {
        scale: 4,
        onrendered: function (canvas) {
            var a = document.createElement('a');
            // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
            a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
            a.download = 'somefilename.jpg';
            a.click();
        }}
    );
});

// Add "Video 1" event listener
$("#addVideo1").click(function () {
    changeVideo(1);
});

// Add "Video 2" event listener
$("#addVideo2").click(function () {
    changeVideo(2);
});

// Add "Video 3" event listener
$("#addVideo3").click(function () {
    changeVideo(3);
});

// Function to setup a predeterminated video
function changeVideo(id) {

    var url;
    
    switch (id) {
        case 1:
            url = "{{ asset('vid/001.mp4') }}";
            break;
        case 2:
            url = "{{ asset('vid/002.mp4') }}";
            break;
        case 3:
            url = "{{ asset('vid/003.mp4') }}";
            break;
    }

    if (!$("#video").is(":visible")) {
        $("#videoDiv").css('visibility', 'visible');
        var video = $('<video />', {
            id: 'video',
            src: url,
            autoplay: true,
            type: 'video/mp4',
            loop: false,
            controls: true
        });
        video.appendTo($('#videoDiv'));
        $("#video").css('width', '100%');
        $("#video").css('height', '100%');

        $("#videoTab").trigger("click");
    } else {
        $('#video').attr('src', url);
        $("#video")[0].load();
    }

}

// Remove video function
$("#removeVideo").click(function () {
    if ($("#video").is(":visible")) {
        $("#video").remove();
        $("#calendarTab").trigger("click");
    }
});


// We configure the button whose create a new text object
$("#addButton").click(function () {
    $('#imagePrev').append('<div class="erasable"><input type="text" class="closebtn" value="X"><p class="CalTxt1" contenteditable="true">Double click here</p></div>');

    $(".erasable").draggable();

    $('.d').resizable();

    $(".erasable").click(function () {
        $(this).draggable({disabled: false, revert: 'invalid'});
    });

    $(".erasable").dblclick(function () {
        $(this).draggable({disabled: true, revert: 'invalid'});
        $('.CalTxt1').setAttribute('contenteditable', true);
        $(this).setAttribute('contenteditable', true);
    });
});

