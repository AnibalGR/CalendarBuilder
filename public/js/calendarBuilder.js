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

// Add "Video 4" event listener
$("#addVideo4").click(function () {
    changeVideo(4);
});

// Add "Video 5" event listener
$("#addVideo5").click(function () {
    changeVideo(5);
});

// Add "Video 6" event listener
$("#addVideo6").click(function () {
    changeVideo(6);
});

// Add "Video 7" event listener
$("#addVideo7").click(function () {
    changeVideo(7);
});

// Add "Video 3" event listener
$("#addVideo8").click(function () {
    changeVideo(8);
});

// Add "Video 9" event listener
$("#addVideo9").click(function () {
    changeVideo(9);
});

// Add "Video 10" event listener
$("#addVideo10").click(function () {
    changeVideo(10);
});

// Add "Video 11" event listener
$("#addVideo11").click(function () {
    changeVideo(11);
});

// Add "Video 12" event listener
$("#addVideo12").click(function () {
    changeVideo(12);
});

$(document).on('click', ".ui-closable-tab", function () {
    var panelId = $(this).closest("li").remove().attr("aria-controls");
    $("#videoID").val(panelId);
    var form = $('#deleteVideoForm');
    var url = form.attr('action');
    var data = form.serialize();

    $.post(url, data, function (result) {
        $("#" + panelId).remove();
        $("#tabs").tabs("refresh");
    }).fail(function (e) {
        alert(JSON.stringify(e));
    });
});

// Initialize all the functions and variables
    $(document).ready(function () {
        
        // Initialize the tabs panel
        $("#tabs").tabs();
        
        // Clean layout
        cleanLayout();

        // Load layout
        loadLayout();

        // Load theme from calendar
        updateTheme();

        // Function to load the calendar
        initThemeChooser({
            init: function (themeSystem) {
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
                    showNonCurrentDates: true
                });

                resizeLayout();
                
            },
            change: function (themeSystem) {
                $('#calendar').fullCalendar('option', 'themeSystem', themeSystem);
            }
        });

        // Initialize canvas
        var canvas = this.__canvas = new fabric.Canvas('c');
        canvas.loadFromJSON(getContent().replace(/&quot;/g, '"'), canvas.renderAll.bind(canvas));

        // Resize canvas
        window.addEventListener('resize', resizeCanvas, false);
        
        $("#imagePrev").resize(function (e) {
            resizeCanvas();
            $("#calendarBack").css("background-size", $("#imagePrev").width() + "px " + $("#imagePrev").height() + "px");
        });
                
        function resizeCanvas() {
            canvas.setHeight($("#c").parent().parent().height());
            canvas.setWidth($("#c").parent().parent().width());
            canvas.renderAll();
        }
        
        // Add text to canvas
        $('#addText').click(function () {

            canvas.add(new fabric.IText('Double click here', {
                left: 50,
                top: 100,
                fontFamily: 'arial black',
                fill: '#000',
                fontSize: 50
            }));

            canvas.renderAll();

        });
        
        $('#font-family').change(function () {
            canvas.getActiveObject().setFontFamily(this.value);
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
                width: 75,
                height: 75
            });

            canvas.add(rect);

            canvas.renderAll();

        });

        // Add rectangle to canvas
        $('#addCircle').click(function () {

            // create a rectangle object
            var circle = new fabric.Circle({
                radius: 40, fill: 'green', left: 100, top: 100
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

        // Asociative function to call the Input File buton
        $("#addImage").click(function () {
            document.getElementById('upImage').click();
        });
    
        // Input Image File function
        $("#upImage").change(function () {

            if (this.files && this.files[0]) {

                var fd = new FormData();
                fd.append('file', this.files[0]);
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: getUploadImageRoute(),
                    contentType: false,
                    processData: false,
                    data: fd,
                    success: function (data) {
                    var myImg = '../../' + data;
                    
                    fabric.Image.fromURL(myImg, function (oImg) {
                        var l = Math.random() * (500 - 0) + 0;
                        var t = Math.random() * (500 - 0) + 0;
                        oImg.scale(0.5);
                        oImg.set({'left': l});
                        oImg.set({'top': t});
                        canvas.add(oImg);
                    });
                        
                    },
                    error: function (data) {
                        if (!$('#imageError').html().length) {
                            $('#imageError').append("<p>" + data.responseJSON.message + "</p>");
                        }
                        var salida = JSON.stringify(data);
                        alert(salida);
                    }
                });
            }
            $("#upImage").val(null);
        });

        function saveCalendar(){
            
            $('#idCal').val(getCalendarID());
            $('#themeCCal').val($('#themeCategory').val());
            $('#themeCal').val($('#theme').val());
            $('#layoutCal').val(getCurrentLayout());
            $('#backgroundCal').val($("#calendarBack").attr('class'));
            $('#contentCal').val(JSON.stringify(canvas));
            var form = $('#form-save');
            var url = form.attr('action');
            var data = form.serialize();
            $.post(url, data, function (result) {
                var currentdate = new Date();
                $("#actionsAlerts").empty();
                $("#actionsAlerts").append("<p id='savedTime'>Saved at " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds() + "</p>");
                setTimeout(function(){
                    $("#savedTime").fadeOut("slow");
                },5000);
            }).fail(function (e) {
                alert(JSON.stringify(e));
            });
            
        }

        $('#saveCalendar').click(function () {

            saveCalendar();
            
        });

        $("#removeObject").click(function () {

            var activeObject = canvas.getActiveObject();
            canvas.remove(activeObject);

        });
        
        $("#removeText").click(function () {

            var activeObject = canvas.getActiveObject();
            canvas.remove(activeObject);

        });
        
        $("#removeShape").click(function () {

            var activeObject = canvas.getActiveObject();
            canvas.remove(activeObject);

        });

        
        $('#cp1').colorpicker({"color":getColorYear()}).on('changeColor', function(e) {
            $(".fc-center h2").css("color", e.color.toString('rgba'));
            $("#colorYearCal").val(e.color.toString('rgba'));
        });
        
        $('#cp2').colorpicker({"color":getColorWeek()}).on('changeColor', function(e) {
            $(".fc-day-header span").css("color", e.color.toString('rgba'));
            $(".fc-day-header").css("color", e.color.toString('rgba'));
            $("#colorWeekCal").val(e.color.toString('rgba'));
        });
        
        $('#cp3').colorpicker({"color":getColorDay()}).on('changeColor', function(e) {
            $(".fc-widget-content a").css("color", e.color.toString('rgba'));
            $(".fc-future a").css("color", e.color.toString('rgba'));
            $(".fc-past a").css("color", e.color.toString('rgba'));
            $("#colorDayCal").val(e.color.toString('rgba'));
        });

        $('#cp4').colorpicker({"color": getColor()}).on('changeColor', function (e) {
            $(".fc-month-view").css("background-color", e.color.toString('rgba'));
            $("#colorCal").val(e.color.toString('rgba'));
        });

        $('#cp5').colorpicker({"color": "#000000"}).on('changeColor', function (e) {
            canvas.getActiveObject().setFill(e.color.toString('rgba'));
            canvas.renderAll();
        });
        
        $('#cp6').colorpicker({"color": "#000000"}).on('changeColor', function (e) {
            canvas.getActiveObject().setTextBackgroundColor(e.color.toString('rgba'));
            canvas.renderAll();
        });
        
        $('#cp7').colorpicker({"color": "#000000"}).on('changeColor', function (e) {
            canvas.getActiveObject().setBackgroundColor(e.color.toString('rgba'));
            canvas.renderAll();
        });
        
        $('#cp8').colorpicker({"color": "#000000"}).on('changeColor', function (e) {
            canvas.getActiveObject().setStroke(e.color.toString('rgba'));
            canvas.renderAll();
        });
        
        $('#cp9').colorpicker({"color": "#000000"}).on('changeColor', function (e) {
            canvas.getActiveObject().setFill(e.color.toString('rgba'));
            canvas.renderAll();
        });
        
        function myDrag(e) {   // funciton on drag (moving)
            e.target.bringToFront();
        }
        
        canvas.on({
            'object:moving': myDrag,
        });
        
        $('#text-stroke-width').slider({
            range: "max",
            min: 0,
            max: 5,
            step: 0.1,
            value: 0.5,
            slide: function (event, ui) {
                canvas.getActiveObject().setStrokeWidth(ui.value);
                canvas.renderAll();
            }
        });
        var handle = $( "#custom-handle" );
        $('#calendar-video-length').slider({
            range: "max",
            min: 15,
            max: 60,
            step: 1,
            value: getVideoLength(),
            create: function () {
                handle.text($(this).slider("value"));
                $("#cal_length").val($(this).slider("value"));
            },
            slide: function (event, ui) {
                handle.text(ui.value);
                $("#cal_length").val(ui.value);
            }
        });
        
        $('#image-color-opacity').slider({
            range: "max",
            min: 0,
            max: 1,
            step: 0.01,
            value: 1,
            slide: function (event, ui) {
                canvas.getActiveObject().setOpacity(ui.value)
                canvas.renderAll();
            }
        });
        
        $('#text-font-size').slider({
            range: "max",
            min: 10,
            max: 120,
            step: 2,
            value: 50,
            slide: function (event, ui) {
                canvas.getActiveObject().setFontSize(ui.value);
                canvas.renderAll();
            }
        });
        
        $('#text-line-height').slider({
            range: "max",
            min: 1,
            max: 5,
            step: 1,
            value: 1,
            slide: function (event, ui) {
                canvas.getActiveObject().setLineHeight(ui.value);
                canvas.renderAll();
            }
        });
        
        function loadColor() {
            var color = getColor();
            if(color != "null"){
                $(".fc-month-view").css("background-color", color);
                $('#colorCal').val(color);
                $('#calendarBackColor').val(color);
            }else{
                $(".fc-month-view").css("background-color", "transparent");
                $('#calendarBackColor').val(color);
                $('#colorCal').val(color);
            }
            
        }
        
        function loadColorYear(){
            var color = getColorYear();
            $(".fc-center h2").css("color", color);
            $('#inputYearColor').val(color);
            $('#colorYearCal').val(color);
        }
        
        function loadColorWeek(){
            var color = getColorWeek();
            $(".fc-day-header span").css("color", color);
            $(".fc-day-header").css("color", color);
            $('#colorWeekCal').val(color);
            $('#calendarWeekColor').val(color);
        }
        
        function loadColorDay(){
            var color = getColorDay();
            $(".fc-widget-content a").css("color", color);
            $(".fc-future a").css("color", color);
            $(".fc-past a").css("color", color);
            $('#colorDayCal').val(color);
            $('#calendarDayColor').val(color);
        }
                
        function loadBackground(){
            var background = getBackground();
            $("#calendarBack").removeClass();
            $("#calendarBack").addClass(background);
            $('#backgroundCal').val(background);
        }
        
    $("#addBg1").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-1');
        
    });
    $("#addBg2").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-2');
        
    });
    
    $("#addBg3").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-3');
        
    });
    
    $("#addBg4").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-4');
        
    });
    
    $("#addBg5").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-5');
        
    });
    
    $("#addBg6").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-6');
        
    });
    
    $("#addBg7").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-7');
        
    });
    
    $("#addBg8").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-8');
        
    });
    
    $("#addBg9").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-9');
        
    });
    
    $("#addBg10").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-10');
        
    });
    
    $("#addBg11").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-11');
        
    });
    
    $("#addBg12").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-12');
        
    });
    
    $("#addBg13").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-13');
        
    });
    
    $("#addBg14").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-14');
        
    });
    
    $("#addBg15").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-15');
        
    });
    
    $("#addBg16").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-16');
        
    });
    
    $("#addBg17").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-17');
        
    });
    
    $("#addBg18").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-18');
        
    });
    
    $("#addBg19").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-19');
        
    });
    
    $("#addBg20").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-20');
        
    });
    
    $("#addBg21").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-21');
        
    });
    
    $("#addBg22").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-22');
        
    });
    
    $("#addBg23").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-23');
        
    });
    
    $("#addBg24").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-24');
        
    });
    
    $("#removeBg").click(function(){
        $("#calendarBack").removeClass();
        $("#calendarBack").attr('class', 'bgimg-none');
    });
    
    $('body').keydown(function (event) {
        if (event.keyCode == 46) {
            var activeObject = canvas.getActiveObject();
            canvas.remove(activeObject);
        }
    });

    $("#addImg1").click(function () {

        var myImg = '../../img/headers/header-1.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg2").click(function () {

        var myImg = '../../img/headers/header-2.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg3").click(function () {

        var myImg = '../../img/headers/header-3.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg4").click(function () {

        var myImg = '../../img/headers/header-4.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg5").click(function () {

        var myImg = '../../img/headers/header-5.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg6").click(function () {

        var myImg = '../../img/headers/header-6.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg7").click(function () {

        var myImg = '../../img/headers/header-7.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg8").click(function () {

        var myImg = '../../img/headers/header-8.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg9").click(function () {

        var myImg = '../../img/headers/header-9.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg10").click(function () {

        var myImg = '../../img/headers/header-10.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg11").click(function () {

        var myImg = '../../img/headers/header-11.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
    $("#addImg12").click(function () {

        var myImg = '../../img/headers/header-12.jpg';

        fabric.Image.fromURL(myImg, function (oImg) {
            oImg.scale(0.5);
            canvas.add(oImg);
        });

    });
    
setTimeout(function () {
            // resize on init
            resizeCanvas();
            loadColor();
            loadColorYear();
            loadColorWeek();
            loadColorDay();
            loadBackground();
            resizeCanvas();
            $("#calendarBack").css("background-size", $("#imagePrev").width() + "px " + $("#imagePrev").height() + "px");
    }, 500);
});