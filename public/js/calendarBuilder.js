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
            $("#calendarBack").attr('class', $("#calendarBack").attr('class'));
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
                        oImg.scale(0.2);
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
            $('#backgroundCal').val("none");
//        $('#colorCal').val("none");
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

        $("#removeObject").click(function () {

            var activeObject = canvas.getActiveObject();
            canvas.remove(activeObject);

        });

        $('#calendarColor').change(function () {
            $(".fc-center h2").css("color", this.value);
            $(".fc-day-header span").css("color", this.value);
            $(".fc-day-header").css("color", this.value);
            $(".fc-widget-content a").css("color", this.value);
            $(".fc-future a").css("color", this.value);
            $(".fc-past a").css("color", this.value);
            $('#colorCal').val(String(this.value));
        });

        function loadColor() {
            var color = getColor();
            $(".fc-center h2").css("color", color);
            $(".fc-day-header span").css("color", color);
            $(".fc-day-header").css("color", color);
            $(".fc-widget-content a").css("color", color);
            $(".fc-future a").css("color", color);
            $(".fc-past a").css("color", color);
            $('#colorCal').val(String(color));
            $('#calendarColor').val(color);
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
    });

$('#calendarBackColor').change(function () {
    $(".fc-month-view").css("background-color", this.value);
});

$('#background-color-opacity').change(function () {
    $(".fc-month-view").css("opacity", this.value);
});

setTimeout(function () {
            // resize on init
            resizeCanvas();
            loadColor();
        }, 1000);
});