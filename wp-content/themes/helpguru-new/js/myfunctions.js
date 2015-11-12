(function(){

  var $ = jQuery;

  console.log("myfunctions.js is alive!");




// var file = $("#fileUpload").val();

// console.log("file: ", file);





	// Contact Form submit handler -------------------------------------------------------------
	$("#contact_form").submit(function(){
		console.log("Contact form submit handler is working!");
		// contact form data in variables
		var name = $("#contact_form_name").val();
		var email = $("#contact_form_email").val();
		var subject = $("#contact_form_subject").val();
		var description = $("#contact_form_description").val();
		// contact form data in a object
		var formData = {
			"Name": name,
			"Email": email,
			"Subject": subject,
			"Description": description
		};
		console.log(formData);

		// send form data with AJAX to DB
		$.ajax({
			url: "../" + "wp-content/themes/helpguru-new/" + "my-php-file.php",
			type: "POST",
			data: { "contact_form_data" : formData },
			success: function(data){
				console.log("Seccessfuly insert formData to DB", data);
				// clear input's text(Subject & Description) after submited Contact form
				var clearInputsText = $("#contact_form_description, #contact_form_subject");
				$('#contact_form').find(clearInputsText).val('');
				// seccess message
				$('#contact_form').find($(".successMessage"))
				.fadeIn()
				.delay(3000)
				.fadeOut(1000);
			},
			error: function(data){
				console.log("Failed to insert formData to DB", data);
				// error message
				$('#contact_form').find($(".errorMessage"))
				.fadeIn()
				.delay(3000)
				.fadeOut(2000);
			}
		});

		// // send form data with AJAX to DB
		// $.ajax({
		// 	url: "../" + "wp-content/themes/helpguru-new/" + "my-php-file.php",
		// 	// dataType: "json",
		// 	type: "POST",
		// 	data: { contact_form_data : JSON.stringify(formData) },
		// 	success: function(data){
		// 		console.log("Seccessfuly insert formData to DB", data);
		// 		// clear input's text(Subject & Description) after submited Contact form
		// 		var clearInputsText = $("#contact_form_description, #contact_form_subject");
		// 		$('#contact_form').find(clearInputsText).val('');
		// 		// seccess message
		// 		$('#contact_form').find($(".successMessage"))
		// 		.fadeIn()
		// 		.delay(3000)
		// 		.fadeOut(1000);
		// 	},
		// 	error: function(data){
		// 		console.log("Failed to insert formData to DB", data);
		// 		// error message
		// 		$('#contact_form').find($(".errorMessage"))
		// 		.fadeIn()
		// 		.delay(3000)
		// 		.fadeOut(2000);
		// 	}
		// });
		
		return false;
	});


	// Error Report form submit hadler ------------------------------------------------------------
	$("#error_report_form").submit(function(){
		console.log("Error Report submit handler working!");
		// get error_report_form data and put them in a variable
		var name = $("#error_report_form_name").val();
		var email = $("#error_report_form_email").val();
		var product = $("#error_report_form_product").val();
		var hardware_v = $("#error_report_form_hardware_version").val();
		var software_v = $("#error_report_form_software_version").val();
		var idesk_v_android = $("#error_report_form_id_app_version_android").val();
		var android_v = $("#error_report_form_android_version_mobile").val();
		var idesk_v_ios = $("#error_report_form_id_app_version_ios").val();
		var ios_v = $("#error_report_form_ios_version_iphone").val();
		var subject = $("#error_report_form_subject").val();
		var description = $("#error_report_form_description").val();
		// the form's data in object
		var formData = {
			"Name":name,
			"Email":email,
			"Product":product,
			"Hardware_v":hardware_v,
			"Software_v" : software_v,
			"iDesk_v_android" : idesk_v_android,
			"Android_v" : android_v,
			"iDesk_v_ios" : idesk_v_ios,
			"iOS_v" : ios_v,
			"Subject" : subject,
			"Description" : description
		};
		// formData depending on product
		if (product === "id/idrive"){
			formData = {
				"Name":name,
				"Email":email,
				"Product":product,
				"Hardware_v":hardware_v,
				"Software_v" : software_v,
				"Subject" : subject,
				"Description" : description
			};
		}else if(product === "app-android"){
			formData = {
				"Name":name,
				"Email":email,
				"Product":product,
				"Hardware_v":hardware_v,
				"Software_v" : software_v,
				"iDesk_v_android" : idesk_v_android,
				"Android_v" : android_v,
				"Subject" : subject,
				"Description" : description
			};
		}else if(product === "app-ios"){
			formData = {
				"Name":name,
				"Email":email,
				"Product":product,
				"Hardware_v":hardware_v,
				"Software_v" : software_v,
				"iDesk_v_ios" : idesk_v_ios,
				"iOS_v" : ios_v,
				"Subject" : subject,
				"Description" : description
			};
		}
		console.log("Error Report formData :",formData);


		// ajax call - sending form data with AJAX to DB
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "../" + "wp-content/themes/helpguru-new/" + "my-php-file.php",
			data : {"error_report_form_data": formData},
			seccess:function(data){
				console.log("Seccessfuly insert formData to DB", data);
				// clear input's text(Subject & Description) after submited form
				$("#error_report_form_subject, #error_report_form_description").val('');
				// seccess message
				// $('#error_report_form').find($(".successMessage"))
				// .fadeIn()
				// .delay(3000)
				// .fadeOut(1000);
			},
			error:function(data){
				console.log("Failed to insert formData to DB", data);
				// error message
				// $('#error_report_form').find($(".errorMessage"))
				// .fadeIn()
				// .delay(3000)
				// .fadeOut(2000);
			}
		});




		// // ajax call - sending form data with AJAX to DB
		// $.ajax({
		// 	url: "../" + "wp-content/themes/helpguru-new/" + "my-php-file.php",
		// 	// dataType: "json",
		// 	type: "POST",
		// 	data : {error_report_form_data : JSON.stringify(formData)},
		// 	seccess:function(data){
		// 		console.log("Seccessfuly insert formData to DB", data);
		// 		// clear input's text(Subject & Description) after submited form
		// 		$("#error_report_form_subject, #error_report_form_description").val('');
		// 		// seccess message
		// 		$('#error_report_form').find($(".successMessage"))
		// 		.fadeIn()
		// 		.delay(3000)
		// 		.fadeOut(1000);
		// 	},
		// 	error:function(data){
		// 		console.log("Failed to insert formData to DB", data);
		// 		// error message
		// 		$('#error_report_form').find($(".errorMessage"))
		// 		.fadeIn()
		// 		.delay(3000)
		// 		.fadeOut(2000);
		// 	}
		// });

		return false;
	});


	//Show/hide inputs depending on which product selected ----------------------------------------
	// and add/remove attr. "required"

	//contact form
	// $(".successMessage").hide();

	//error report form
	$(".drop-down-holder").not("#product_placeholder").hide();
	$("#error_report_form_product").change(function(){
		if($(this).val() == "id/idrive"){
			$(".drop-down-holder")
				.not("#product_placeholder, #hardware_version_placeholder, #software_version_placeholder")
				.hide("fast");
			$("#hardware_version_placeholder").show("fast");
			$("#software_version_placeholder").show("fast");
			// remove attr. "required"
			$("#error_report_form_id_app_version_android").removeAttr("required");
			$("#error_report_form_android_version_mobile").removeAttr("required");
			$("#error_report_form_id_app_version_ios").removeAttr("required");
			$("#error_report_form_ios_version_iphone").removeAttr("required");
			// add attr "required"
			$('#error_report_form_hardware_version').prop('required',true);
			$('#error_report_form_software_version').prop('required',true);
		}else if($(this).val() == "app-android"){
			$(".drop-down-holder")
				.not("#product_placeholder, #hardware_version_placeholder, #software_version_placeholder")
				.hide("fast");
			$("#hardware_version_placeholder").show("fast");
			$("#software_version_placeholder").show("fast");
			$("#id_app_version_android_placeholder").show("fast");
			$("#android_version_mobile_placeholder").show("fast");
			// remove atrr. "required"
			$("#error_report_form_id_app_version_ios").removeAttr("required");
			$("#error_report_form_ios_version_iphone").removeAttr("required");
			// add attr "required"
			$('#error_report_form_hardware_version').prop('required',true);
			$('#error_report_form_software_version').prop('required',true);
			$('#error_report_form_id_app_version_android').prop('required',true);
			$('#error_report_form_android_version_mobile').prop('required',true);
		}else if($(this).val() == "app-ios"){
			$(".drop-down-holder")
				.not("#product_placeholder, #hardware_version_placeholder, #software_version_placeholder")
				.hide("fast");
			$("#hardware_version_placeholder").show("fast");
			$("#software_version_placeholder").show("fast");
			$("#id_app_version_ios_placeholder").show("fast");
			$("#ios_version_iphone_placeholder").show("fast");
			// remove attr. "required"
			$("#error_report_form_id_app_version_android").removeAttr("required");
			$("#error_report_form_android_version_mobile").removeAttr("required");
			// add attr "required"
			$('#error_report_form_hardware_version').prop('required',true);
			$('#error_report_form_software_version').prop('required',true);
			$('#error_report_form_id_app_version_ios').prop('required',true);
			$('#error_report_form_ios_version_iphone').prop('required',true);
		}
	});



	// validation ex.
	// $( "form" ).submit(function( event ) {
 //  if ( $( "input:first" ).val() === "correct" ) {
 //    $( "span" ).text( "Validated..." ).show();
 //    return;
 //  }
 
 //  $( "span" ).text( "Not valid!" ).show().fadeOut( 1000 );
 //  event.preventDefault();
	// });




})();