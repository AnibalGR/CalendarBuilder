 $('#saveImage').click(function(){
    
// Create scaled canvas
    var scaleFactor = 5;
    var originalWidth = document.getElementById('imagePrev').offsetWidth;
    alert(originalWidth);
    var originalHeight = document.getElementById('imagePrev').offsetHeight;
    alert(originalHeight);
    var scaledCanvas = document.createElement("canvas");
    scaledCanvas.width = originalWidth * scaleFactor;
    scaledCanvas.height = originalHeight * scaleFactor;
    scaledCanvas.style.width = originalWidth + "px";
    scaledCanvas.style.height = originalHeight + "px";
    var scaledContext = scaledCanvas.getContext("2d");
    scaledContext.scale(scaleFactor, scaleFactor);    
    
    html2canvas($('.prueba'), {
        canvas: scaledCanvas,
        onrendered: function(canvas) {
        var a = document.createElement('a');
        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
        a.download = 'somefilename.jpg';
        a.click();
        }}
    );
    
});



$('#saveImage').click(function(){
    
// Create scaled canvas
    var scaleFactor = 5;
    var originalWidth = document.getElementById('imagePrev').offsetWidth;
    alert(originalWidth);
    var originalHeight = document.getElementById('imagePrev').offsetHeight;
    alert(originalHeight);
    var scaledCanvas = document.createElement("canvas");
    scaledCanvas.width = originalWidth * scaleFactor;
    scaledCanvas.height = originalHeight * scaleFactor;
    scaledCanvas.style.width = originalWidth + "px";
    scaledCanvas.style.height = originalHeight + "px";
    var scaledContext = scaledCanvas.getContext("2d");
    scaledContext.scale(scaleFactor, scaleFactor);    
    
    html2canvas($('.prueba'), {
        canvas: scaledCanvas,
        onrendered: function(canvas) {
        var a = document.createElement('a');
        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
        a.download = 'somefilename.jpg';
        a.click();
       
        
});
//        var a = document.createElement('a');
//        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
//        a.href = canvas.toDataURL("image/png", 1000);//.replace("image/jpeg", "image/octet-stream");
//        a.download = 'somefilename.png';
//        a.click();
}});
    
//    html2canvas($('.prueba'), { canvas: scaledCanvas })
//    .then(function(canvas) {
//        var a = document.createElement('a');
//        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
//        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
//        a.download = 'somefilename.jpg';
//        a.click();
//    });
    
//$('#saveImage').click(function(){
//    html2canvas($('.prueba'), {
//    onrendered: function(canvas) {
//        var a = document.createElement('a');
//        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
//        a.href = canvas.toDataURL("image/png", 1000);//.replace("image/jpeg", "image/octet-stream");
//        a.download = 'somefilename.png';
//        a.click();
//    }
//});
});