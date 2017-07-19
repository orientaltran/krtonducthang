jQuery(document).ready(function(){
	jQuery(function() {
		jQuery('div.da-thumbs').hoverdir();
		
	});
});

// $( "#editTour" ).click(function() {
// 	var name = $("#stours :selected").text().trim(); // The text content of the selected option
//  	var id = $("#stours").val(); // The value of the selected option
//  	var alias = $('#stours').find('option:selected').attr('alias');

//  	$('#nameTour').val(name);
//  	$('#idTour').val(id);
//  	$('#aliasTour').val(alias);

//  });

$(document).on("click",".btnIdTour", function() {
    var nameTour = $(this).attr("nameTour");
    var idTour = $(this).attr("idTour");
    var aliasTour = $(this).attr("aliasTour");

    $('#nameTour').val(nameTour);
    $('#idTour').val(idTour);
    $('#aliasTour').val(aliasTour);
});

$('#idType').on('change', function () {
    if(this.value === "1"){
        $("#nextScene").show();
    } else {
        $("#nextScene").hide();
    }
});

// $("#btnTDelete").click(function(){
// 	$.post("/tours/delete/",
//     {
//         idTour: $("#idTour").val()
//     },function(data, status){
//     	console.log("success");
//     });
// });

$(document).on('click', '#btnTDelete', function(){
    $.ajax({
        url: '/tours/delete/',
        type: 'POST',
        
        data: {
            idTour: $("#idTour").val()
        },
        error: function() {

            console.log("error");
        },
        success: function(data) {
            console.log("success");
        },
    }); 
});

$(document).on('click', '.editScene', function(){
    var inputNameScene =  $(this).attr("sceneName");
    var inputIdScene = $(this).attr("sceneId");

    $.post("/hotspots/addEdit",
    {
        nameScene: inputNameScene,
        idScene: inputIdScene
    },function(data, status){
        console.log("success");
    });
});

// var arrayScene = [];
// $('.txtNameScene').each(function(){
//     arrayScene.push($(this).val());
// });

$(document).on('click', '.btnUpload', function() {
    $('#formScene').show();
});









































