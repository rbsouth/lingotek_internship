class ApiGrab {
	
	getUrl(url){
		// Created the xhr variable, which stands for XML HTTP Request.
		var xhr = new XMLHttpRequest();

		// Make the actual request to the url passed in the url argument.
		xhr.open("GET", url, false);
		xhr.send(); // this sends the request
		var xhrStringResponse = xhr.response; // this is a string of the response 
		var xhrJson = JSON.parse(xhrStringResponse); // parse it to JSON so we can access the key, value pairs

		// this format of loop is used for objects
		for (var key in xhrJson){
			// use a jquery selector to access the html element where the list of languages will go
			var languages = $(".lingotek-languages")
			if (xhrJson.hasOwnProperty(key)) {
				languages.append("<p>" + xhrJson[key]["language"] + "</p>")	// each language in the object, we now output the name in html format
			}
		}
	}
}

$(function(){
	// finally we call the method on the url after the page loads
	var languages = $(".lingotek-languages")
	var apigrab = new ApiGrab();
	languages.on("click", function(){
		languages.html("");
		apigrab.getUrl("http://gmc.lingotek.com/language");
	});
});