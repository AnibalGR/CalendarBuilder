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

