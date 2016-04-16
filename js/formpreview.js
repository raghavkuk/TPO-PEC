function formPreview(formID, previewAction, previewTarget){
	
	window.setTimeout(function() {
		// get the form
		var form = document.getElementById(formID);
		
		// save original attribute values
		var formAction = form.action;
		var formTarget = form.target;
		
		// try to submit the form data to a new window
		try {
			form.target = previewTarget;
			form.action = previewAction;
			form.submit();
		} catch(e){
			alert('Es konnte leider keine Vorschau erzeugt werden!');
		}
		
		// reset the form attributes to their original data
		form.action = formAction;
		form.target = formTarget;
	
	}, 500);
	
	return false;
}