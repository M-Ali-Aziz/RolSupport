(function(){
	var $ = jQuery;
	
	console.log("error-report-form.js activated!");


	// Error-Report-Form submit handler
	var files;

		$('#error_report_file_input').on('change', prepareUpload);
		$('#error_report_form').on('submit', uploadFiles);

		function prepareUpload(event)
		{
			files = event.target.files;
			console.log("files: ", files);

		}

		function uploadFiles(event)
		{
			event.stopPropagation(); // Stop stuff happening
			event.preventDefault(); // Totally stop stuff happening

			// START A LOADING SPINNER HERE

			// Create a formdata object and add the files
			var data = new FormData();

			if(files){
				$.each(files, function(key, value)
				{
					data.append(key, value);
					console.log("data: ", data);
				});
			}

			$.ajax({
				url:"../" + "wp-content/themes/helpguru-new/" + "error-report-form.php?files",
				type: 'POST',
				data: data,
				cache: false,
				dataType: 'json',
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				success: function(data, textStatus, jqXHR)
				{
					if(typeof data.error === 'undefined')
					{
						// Success so call function to process the form
						submitForm(event, data);
						console.log("success fileUpload -> get the function 'submitForm'!" , data, event);
					}
					else
					{
						// Handle errors here
						console.log('ERRORS: ' + data.error);

						// error message
						$('#error_report_form').find($(".errorMessage"))
						.fadeIn()
						.delay(3000)
						.fadeOut(2000);

					}
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					// Handle errors here
					console.log('ERRORS: ' + textStatus);

					// error message
					$('#error_report_form').find($(".errorMessage"))
					.fadeIn()
					.delay(3000)
					.fadeOut(2000);

					// STOP LOADING SPINNER
				}
			});
		}



		function submitForm(event , data){

			// Create a jQuery object from the form
			$form = $(event.target);

			// Serialize the form data
			var formData = $form.serialize();

			// sterilise the file names
			$.each(data.files, function(key, value)
			{
				console.log("key: ", key);
				console.log("valeu: ", value);

				formData = formData + '&filenames[]=' + value;

				console.log("formData: ", formData);
			});

			$.ajax({
				url: "../" + "wp-content/themes/helpguru-new/" + "error-report-form.php",
				type: 'POST',
				data: formData,
				cache: false,
				dataType: false,
				// dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					if(typeof data.error === 'undefined')
					{
						// Success so call function to process the form
						console.log('SUCCESS: ' + data.success);
						console.log('SUCCESS: ' + data);

						// clear input's text(Subject & Description) after submited Contact form
						// var clearInputsText = $("#contact_form_description, #contact_form_subject");
						// $('#error_report_form').find(clearInputsText).val('');

						// seccess message
						$('#error_report_form').find($(".successMessage"))
						.fadeIn()
						.delay(3000)
						.fadeOut(1000);

					}
					else
					{
						// Handle errors here
						console.log('ERRORS: ' + data.error);

						// error message
						$('#error_report_form').find($(".errorMessage"))
						.fadeIn()
						.delay(3000)
						.fadeOut(2000);
					}
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					// Handle errors here
					console.log('ERRORS: ' + textStatus);

					// error message
					$('#error_report_form').find($(".errorMessage"))
					.fadeIn()
					.delay(3000)
					.fadeOut(2000);
				},
				complete: function()
				{
					// STOP LOADING SPINNER
				}
			});
		}




	//Show/hide inputs depending on which product selected ----------------------------------------
	// and add/remove attr. "required"

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








	
})();