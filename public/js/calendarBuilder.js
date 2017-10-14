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

