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

    $('.CalTxt1').resizable();

    $(".erasable").click(function () {
        $(this).draggable({disabled: false, revert: 'invalid'});
    });

    $(".erasable").dblclick(function () {
        $(this).draggable({disabled: true, revert: 'invalid'});
        $('.CalTxt1').setAttribute('contenteditable', true);
        $(this).setAttribute('contenteditable', true);
    });
});

$('#delObject').change(function () {
    if ($("#delObject").is(':checked')){
        $('.erasable').addClass('erasable-2').removeClass('erasable');
        $('.closebtn').addClass('closebtn-2').removeClass('closebtn');
    }else{
        $('.erasable-2').addClass('erasable').removeClass('erasable-2');
        $('.closebtn-2').addClass('closebtn').removeClass('closebtn-2');
    }
});

$("#imagePrev").on("click", "input.closebtn-2", function(){
    $(this).parent().remove();
});

// Initialize all the functions and variables
$(document).ready(function () {
    
    // Initialize the tabs panel
    $("#tabs").tabs();

    // Load theme from calendar
    updateTheme();
    
    // Clean layout
    cleanLayout();
    
    // Load layout
    loadLayout();

    // Load video if present
    loadVideo();

    // Give element properties
    setObjectsProperties();
    
    // Initialize canvas
    var canvas = this.__canvas = new fabric.Canvas('c');
    canvas.setHeight(500);
    canvas.setWidth(500);

    // Resize canvas
    window.addEventListener('resize', resizeCanvas, false);

    function resizeCanvas() {
        canvas.setHeight($("#c").parent().parent().height());
        canvas.setWidth($("#c").parent().parent().width());
        canvas.renderAll();
    }
    
    // resize on init
    resizeCanvas();

    // Add text to canvas
    $('#addText').click(function () {

        canvas.add(new fabric.IText('Tap and Type', {
            left: 50,
            top: 100,
            fontFamily: 'arial black',
            fill: '#333',
            fontSize: 50
        }));

        canvas.renderAll();

    });

});