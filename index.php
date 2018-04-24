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
		<div class="insta-api-response">
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
				// $response returns all the data from the users last 20 posts.
				
				// Here we tell PHP to output the start of a paragraph tag
				echo '<p> Number of likes: ';
				// This is where we can get information from within $response which is a Multidimensional array
				// I went ahead and ran $ php index.php in the terminal to get an idea of where the data is and how to access it
				// var_export will give a stringified version of the variables value
				echo var_export($response["data"][0]["likes"]["count"]); // this will give us access to the number of liked on my most recent post
				echo " <a href=";
				echo var_export($response["data"][0]["link"]); // this returns the link of the most recent post
				echo ">"; 
				echo "Link to the post";
				echo "</a>";
				echo '</p>';// Here we end the paragraph tag
			 ?>
		</div>
	</body>
</html>