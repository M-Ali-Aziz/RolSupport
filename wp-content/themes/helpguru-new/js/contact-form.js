(function(){
	var $ = jQuery;
	
	console.log("contact-form.js activated!");

	
			var files;

			$('#contact_form_file_input').on('change', prepareUpload);
			$('#contact_form').on('submit', uploadFiles);

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
					url:"../" + "wp-content/themes/helpguru-new/" + "contact-form.php?files",
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
							$('#contact_form').find($(".errorMessage"))
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
						$('#contact_form').find($(".errorMessage"))
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

			// You should sterilise the file names
			$.each(data.files, function(key, value)
			{
				console.log("key: ", key);
				console.log("valeu: ", value);

				formData = formData + '&filenames[]=' + value;

				console.log("formData: ", formData);
			});

			$.ajax({
				url: "../" + "wp-content/themes/helpguru-new/" + "contact-form.php",
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
						var clearInputsText = $("#contact_form_description, #contact_form_subject");
						$('#contact_form').find(clearInputsText).val('');

						// seccess message
						$('#contact_form').find($(".successMessage"))
						.fadeIn()
						.delay(3000)
						.fadeOut(1000);

					}
					else
					{
						// Handle errors here
						console.log('ERRORS: ' + data.error);

						// error message
						$('#contact_form').find($(".errorMessage"))
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
					$('#contact_form').find($(".errorMessage"))
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


	
})();