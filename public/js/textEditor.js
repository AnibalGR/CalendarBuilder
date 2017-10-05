$('#bold').click(function () {

    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('bold', false, null);
});

$('#italic').click(function () {

    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('italic', false, null);
});

$('#underline').click(function () {

    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('underline', false, null);
});

$('#undo').click(function () {

    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('undo', false, null);
});

$('#copy').click(function () {

    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('copy', false, null);
});

$('#cut').click(function () {

    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('cut', false, null);
});

$('#delete').click(function () {

    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('delete', false, null);
});

function H(size) {

    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('formatBlock', false, '<' + size + '>');
};


$( "#fontSize" ).change(function() {
  var size = $( "#fontSize option:selected" ).text();
  H(size);
});

$('#white').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "white");
    
});

$('#lightBlue').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "#add8e6");
    
});
$('#steelBlue').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "#4682B4");
    
});

$('#blue').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "blue");
    
});

$('#lightGreen').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "#90EE90");
    
});

$('#green').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "green");
    
});

$('#darkGreen').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "#006400");
    
});

$('#purple').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "#800080");
    
});

$('#hotPink').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "#FF69B4");
    
});

$('#yellow').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "yellow");
    
});

$('#gold').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "#FFD700");
    
});

$('#orange').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "orange");
    
});

$('#red').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "red");
    
});

$('#gray').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "gray");
    
});

$('#brown').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "brown");
    
});

$('#black').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('foreColor', false, "black");
    
});

$('#white2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "white");
    
});

$('#lightBlue2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "#add8e6");
    
});
$('#steelBlue2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "#4682B4");
    
});

$('#blue2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "blue");
    
});

$('#lightGreen2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "#90EE90");
    
});

$('#green2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "green");
    
});

$('#darkGreen2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "#006400");
    
});

$('#purple2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "#800080");
    
});

$('#hotPink2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "#FF69B4");
    
});

$('#yellow2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "yellow");
    
});

$('#gold2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "#FFD700");
    
});

$('#orange2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "orange");
    
});

$('#red2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "red");
    
});

$('#gray2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "gray");
    
});

$('#brown2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "brown");
    
});

$('#black2').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('backColor', false, "black");
    
});

$( "#fontName" ).change(function() {
  var size = $( "#fontName option:selected" ).text();
  N(size);
});

function N(size) {

    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('fontName', false, size);
};

$('#paste').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('Paste', null, null);
});

$('#redo').click(function () {
    
    var sel = window.getSelection();
    if (sel.rangeCount && sel.getRangeAt) {
        range = sel.getRangeAt(0);
    }
    if (range) {
        sel.removeAllRanges();
        sel.addRange(range);
    }
    document.execCommand('redo', false, null);
    
});

$('.closebtn-2').click(function () {
    alert('Si entró');
});

$('#removeObject').click(function () {
    $('.erasable').addClass('erasable-2').removeClass('erasable');
    $('.closebtn').addClass('closebtn-2').removeClass('closebtn');
});

