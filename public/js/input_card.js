$(document).ready(function(){
    var S = $("#hoten").val();
    responsiveVoice.speak(S,"Vietnamese Male");

    $('#btn_doc_ten').click(function (e) {
    	var S = $("#hoten").val();
        responsiveVoice.speak(S,"Vietnamese Male");
    });
});