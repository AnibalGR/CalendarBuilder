// Function to show te Top Layout
function showTopLayout() {
    // Clean any previous layout
    cleanLayout();
    // Must see if is already visible
    $("#topLayout").css('visibility', 'visible');
    $("#topLayout").css('border-color', 'black');
    $("#topLayout").css('border-style', 'solid');
    // Show top Layout
    $("#topLayout").show();
    // Resize the canvas
//    resizeImagePrev();
}

// Function to show the Bottom Layout
function showBottomLayout() {
    // Clean any previous layout
    cleanLayout();
    // Must see if is already visible
    $("#bottomLayout").css('visibility', 'visible');
    $("#bottomLayout").css('border-color', 'black');
    $("#bottomLayout").css('border-style', 'solid');
    // Show top Layout
    $("#bottomLayout").show();
    // Resize the canvas
//    resizeImagePrev();
}

// Function to show the Left Layout
function showLeftLayout() {
    cleanLayout();
    $("#leftLayout").css('visibility', 'visible');
    $("#leftLayout").css('height', $("#calendarCont").height());
    $("#leftLayout").css('width', '25%');
    $("#leftLayout").css('border-color', 'black');
    $("#leftLayout").css('border-style', 'solid');
    $("#calendar").css('max-width', '75%');
    $("#calendar").css('float', 'right');
    $("#leftLayout").show();
}

// Function to show the Right Layout
function showRightLayout() {
    cleanLayout();
    $("#rightLayout").css('visibility', 'visible');
    $("#rightLayout").css('height', $("#calendarCont").height());
    $("#rightLayout").css('width', '25%');
    $("#rightLayout").css('border-color', 'black');
    $("#rightLayout").css('border-style', 'solid');
    $("#calendar").css('max-width', '75%');
    $("#calendar").css('float', 'left');
    $("#rightLayout").show();
}

// Function to clear the Layout
function cleanLayout() {
    $("#topLayout").hide();
    $("#bottomLayout").hide();
    $("#leftLayout").hide();
    $("#rightLayout").hide();
    $("#calendar").css('max-width', '100%');
    $("#calendar").css('float', 'none');
//    resizeImagePrev();
};

// Button to show the top Layout
$("#showTopLayout").click(function () {

    showTopLayout();
    
});

// Button to show the bottom Layout
$("#showBottomLayout").click(function () {

    showBottomLayout();
    
});

// Button to show the left Layout
$("#showLeftLayout").click(function () {
    
    showLeftLayout();
    
});

// Button to show the right Layout
$("#showRightLayout").click(function () {

    showRightLayout();
    
});

// Button to remove the Layout
$("#noneLayout").click(function () {
    cleanLayout();
});

// Function to resize Left and Right Layouts
function resizeLayout() {
    if ($("#leftLayout").is(":visible")) {
        $("#leftLayout").css('height', $("#calendarCont").height());
    }
    if ($("#rightLayout").is(":visible")) {
        $("#rightLayout").css('height', $("#calendarCont").height());
    }
}

// Function to get actual Layout
function getLayout2() {
    if ($("#bottomLayout").is(":visible")) {
        return 'bottom';
    }
    if ($("#rightLayout").is(":visible")) {
        return 'right';
    }
    if ($("#leftLayout").is(":visible")) {
        return 'left';
    }
    if ($("#topLayout").is(":visible")) {
        return 'top';
    }
    return 'none';
}

// Function to get and load Layout
function loadLayout() {
    $actualLayout = getLayout();
    switch ($actualLayout) {
        case "none":
            cleanLayout();
            break;
        case "top":
            showTopLayout();
            break;
        case "bottom":
            showBottomLayout();
            break;
        case "left":
            showLeftLayout();
            break;
        case "right":
            showRightLayout();
            break;
    }
}

// Function to resize canvas size
function resizeImagePrev(){
    $("#imagePrev").height($("#calendarCont").height());
    $("#imagePrev").width($("#calendarCont").width());
}