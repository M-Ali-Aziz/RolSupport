(function(){

	var $ = jQuery;

	console.log("functionTest is alive!");




	$("#display").click(function() {

		$.ajax({
			type: "GET",
			url: "../" + "wp-content/themes/helpguru-new/" + "phpFileTest.php",
			dataType: "html",   //expect html to be returned
			success: function(response){
				$("#responsecontainer").html(response);
				console.log("Successs data: ", response);
				//alert(response);
			}

		});

	});

























	// $("#List").click(function(){

	// 	$.ajax({
	// 		url: "../" + "wp-content/themes/helpguru-new/" + "phpFileTest.php",
	// 		data: "",
	// 		type: "POST",
	// 		dataType: 'json',
	// 		success: function(data)
	// 		{
	// 			console.log("Success data: ", data);
				
	// 			// var id = data[0];
	// 			// var vname = data[1];
	// 			// $('#output').html("<b>id: </b>"+id+"<b> name: </b>"+vname);
	// 		},
	// 		error: function(data){
	// 			console.log("error: ",data);
	// 		}
	// 	});
		
	// });

})();