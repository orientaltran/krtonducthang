$("#btnSaveScene").click(function(){
    //avariable
    var hotspotName = [];
    var hotspotAtv = [];
    var hotspotAth = [];
    //get my krpano
    var myKrpano = document.getElementById("krpanoSWFObject");

    var queryhost = "hotspot";
    var myHotspot = myKrpano.get(queryhost); // or myKRPano.get("hotspot['spot0']");
    console.log(myKrpano);
    var listHotspot = myHotspot.getArray();
    for (var i = listHotspot.length - 1; i >= 0; i--) {
        if(!listHotspot[i].name.indexOf("spot")){
            hotspotName.push(listHotspot[i].name);
            hotspotAtv.push(listHotspot[i].atv);
            hotspotAth.push(listHotspot[i].ath);
             // $("hotspot[name=" + listHotspot[i].name + "]").attr("atv",listHotspot[i].atv);
             // $("hotspot[name=" + listHotspot[i].name + "]").attr("ath",listHotspot[i].ath);
         }
     }

     $.post("/hotspots/addEdit",
     {
        hpName: hotspotName,
        hpAtv: hotspotAtv,
        hpAth: hotspotAth
    },function(data, status){
        console.log(hotspotName);
        console.log(hotspotAtv);
        console.log(hotspotAth);
    });

 });


$("#btnHpDelete").click(function(){
	$.post("/hotspots/delete",
    {
        hpDelete: $("#hpDelete").val()
    },function(data, status){
    	console.log("success");
    });
});

function modalopen(hotspotID) {
	$('#hpDelete').val(hotspotID);
}


