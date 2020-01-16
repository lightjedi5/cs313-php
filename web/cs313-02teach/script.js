document.getElementById('btn1').addEventListener('click', triggerAlert);
//document.getElementById('colorBtn').addEventListener('click', changeColor);
function triggerAlert(){
alert("Clicked!");
}

function changeColor(){
    let pickedColor = document.getElementById('color_chooser').value;
    let div = document.getElementById('first');

    div.style.color = pickedColor;
}

$(document).ready(function(){
    $("#colorBtn").click(function(){
        $("#first").css("background-color", $('#color_chooser').val());
    });

    $('#darth_fader').click(function(){
        $('#3rd').fadeToggle("slow");
    });
});