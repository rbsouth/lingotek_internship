<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="index.css">
		<title>Lingotek Internship</title>
	</head>
	<body>
		<!-- all references located in readme -->
		<!-- use php directly in html using <?php ?> -->
		<?php 

			// call curl function and set to reusable variable for later
			$curl = curl_init();

			// set my desired url to variable as well (in this case for instagram posts)
			$url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=2123572027.cd79c6a.976b7871fb43489bb64cdda4c067bc44';

			// function to set options for $curl. got some pointers from https://stackoverflow.com/questions/33302442/get-info-from-external-api-url-using-php
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache"
			  ),
			));

			// Execute the given cURL session above
			$response = curl_exec($curl);
			// Returns a clear text error message for the last cURL operation
			$err = curl_error($curl);
			// Close a cURL session
			curl_close($curl);

			// json_decode takes up to 4 arguments, in this case we give the API response as the first argument and set the second argument, "assoc" to true, this will return objects as accotiative arrays, making them easier to access.
			$response = json_decode($response, true);
			echo $response['data']['link'];
		 ?>
	</body>
</html>