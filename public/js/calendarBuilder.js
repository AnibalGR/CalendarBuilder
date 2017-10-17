/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



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

