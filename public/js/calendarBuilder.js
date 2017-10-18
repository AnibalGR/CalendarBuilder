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

    // Clean layout
    cleanLayout();
    
    // Load layout
    loadLayout();

    // Load video if present
    loadVideo();

    // Give element properties
    setObjectsProperties();
    
    
    
    // Function to load the calendar
    initThemeChooser({
        init: function(themeSystem) {
            $('#calendar').fullCalendar({
                themeSystem: themeSystem,
                height: 'auto',
                header: {
                    left: null,
                    center: 'title',
                    right: null
                },
                defaultDate: getYear() + '-' + getMonth(),
                weekNumbers: false,
                navLinks: true,
                editable: true,
                eventLimit: true,
                showNonCurrentDates: false,
            });
            
            resizeLayout();
            
        },
        change: function(themeSystem) {
            $('#calendar').fullCalendar('option', 'themeSystem', themeSystem);
        }
    });
    
    // Load theme from calendar
    updateTheme();
    
    
    // Initialize canvas
    var canvas = this.__canvas = new fabric.Canvas('c');
    canvas.loadFromJSON(getContent().replace(/&quot;/g,'"'), canvas.renderAll.bind(canvas));
//    canvas.setHeight(500);
//    canvas.setWidth(500);

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

        canvas.add(new fabric.IText('Double click here', {
            left: 50,
            top: 100,
            fontFamily: 'arial black',
            fill: '#333',
            fontSize: 50
        }));

        canvas.renderAll();

    });
    
    $('#text-color').change(function () {
        canvas.getActiveObject().setFill(this.value);
        canvas.renderAll();
    });

    $('#text-bg-color').change(function () {
        canvas.getActiveObject().setBackgroundColor(this.value);
        canvas.renderAll();
    });

    $('#text-lines-bg-color').change(function () {
        canvas.getActiveObject().setTextBackgroundColor(this.value);
        canvas.renderAll();
    });

    $('#text-stroke-color').change(function () {
        canvas.getActiveObject().setStroke(this.value);
        canvas.renderAll();
    });

    $('#text-stroke-width').change(function () {
        canvas.getActiveObject().setStrokeWidth(this.value);
        canvas.renderAll();
    });

    $('#font-family').change(function () {
        canvas.getActiveObject().setFontFamily(this.value);
        canvas.renderAll();
    });

    $('#text-font-size').change(function () {
        canvas.getActiveObject().setFontSize(this.value);
        canvas.renderAll();
    });

    $('#text-line-height').change(function () {
        canvas.getActiveObject().setLineHeight(this.value);
        canvas.renderAll();
    });

    $('#text-align').change(function () {
        canvas.getActiveObject().setTextAlign(this.value);
        canvas.renderAll();
    });
    
    
    radios5 = document.getElementsByName("fonttype");  // wijzig naar button
    for (var i = 0, max = radios5.length; i < max; i++) {
        radios5[i].onclick = function () {

            if (document.getElementById(this.id).checked == true) {
                if (this.id == "text-cmd-bold") {
                    canvas.getActiveObject().set("fontWeight", "bold");
                }
                if (this.id == "text-cmd-italic") {
                    canvas.getActiveObject().set("fontStyle", "italic");
                }
            } else {
                if (this.id == "text-cmd-bold") {
                    canvas.getActiveObject().set("fontWeight", "");
                }
                if (this.id == "text-cmd-italic") {
                    canvas.getActiveObject().set("fontStyle", "");
                }
            }
            canvas.renderAll();
        };
    }

    // Add rectangle to canvas
    $('#addRect').click(function () {

        // create a rectangle object
        var rect = new fabric.Rect({
            left: 100,
            top: 100,
            fill: 'red',
            width: 50,
            height: 50
        });

        canvas.add(rect);

        canvas.renderAll();

    });
    
    // Add rectangle to canvas
    $('#addCircle').click(function () {

        // create a rectangle object
        var circle = new fabric.Circle({
            radius: 20, fill: 'green', left: 100, top: 100
        });

        canvas.add(circle);

        canvas.renderAll();

    });
    
    // Add triangle to canvas
    $('#addTriangle').click(function () {

        // create a triangle object
        var triangle = new fabric.Triangle({
            width: 40, height: 60, fill: 'blue', left: 50, top: 50
        });

        canvas.add(triangle);

        canvas.renderAll();

    });
    
    // Add line to canvas
    $('#addLine').click(function () {

        // create a triangle object
        var line = new fabric.Line([100, 100, 200, 150], {
            left: 170,
            top: 150,
            stroke: 'black'
        });

        canvas.add(line);

        canvas.renderAll();

    });
    
    // Add star to canvas
    $('#addStar5').click(function () {

        // create a star object
        var points = starPolygonPoints(5, 50, 20);
        var star = new fabric.Polygon(points, {
            fill: 'yellow',
            stroke: 'black',
            left: 50,
            top: 50
        });

        canvas.add(star);

        canvas.renderAll();

    });
    
    // Add star to canvas
    $('#addStar4').click(function () {

        // create a star object
        var points = starPolygonPoints(4, 50, 20);
        var star = new fabric.Polygon(points, {
            fill: 'yellow',
            stroke: 'black',
            left: 50,
            top: 50
        });

        canvas.add(star);

        canvas.renderAll();

    });

    function starPolygonPoints(spikeCount, outerRadius, innerRadius) {
        var rot = Math.PI / 2 * 3;
        var cx = outerRadius;
        var cy = outerRadius;
        var sweep = Math.PI / spikeCount;
        var points = [];
        var angle = 0;

        for (var i = 0; i < spikeCount; i++) {
            var x = cx + Math.cos(angle) * outerRadius;
            var y = cy + Math.sin(angle) * outerRadius;
            points.push({x: x, y: y});
            angle += sweep;

            x = cx + Math.cos(angle) * innerRadius;
            y = cy + Math.sin(angle) * innerRadius;
            points.push({x: x, y: y});
            angle += sweep
        }
        return (points);
    }

    $('#saveCalendar').click(function () {

        var $themeCategory = $('#themeCategory').val();
        var $theme = $('#theme').val();
        var $layout = getLayout();
        var video = $('#video').length;
        var $src = "none";
        if (video) {
            $src = $('#video').attr('src');
        }
        ;
        $('#idCal').val(getUserID());
        $('#nameCal').val(getName());
        $('#yearCal').val(getYear());
        $('#monthCal').val(getMonth());
        $('#themeCCal').val($themeCategory);
        $('#themeCal').val($theme);
        $('#layoutCal').val($layout);
        $('#videoCal').val($src);
        $('#contentCal').val(JSON.stringify(canvas));
        var form = $('#form-save');
        var url = form.attr('action');
        var data = form.serialize();
        $.post(url, data, function (result) {
            alert(result);
        }).fail(function (e) {
            alert(JSON.stringify(e));
        });
    });



});