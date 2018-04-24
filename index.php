<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="index.css">
		<title>Lingotek Internship</title>
	</head>
	<body>
		<h1>Problem 1</h1>
		<div class="problem"> 1. Use php or javascript to connect via API to pull down content (e.g. pins, posts, statuses) from any one of the following social networks: LinkedIn, Instagram, or Pinterest. </div>
		<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/BhwjG3ugIJY/" data-instgrm-version="8" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:62.5% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BhwjG3ugIJY/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">🌞</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A post shared by <a href="https://www.instagram.com/reidsouth/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px;" target="_blank"> Reid South</a> (@reidsouth) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2018-04-19T16:22:34+00:00">Apr 19, 2018 at 9:22am PDT</time></p></div></blockquote> <script async defer src="//www.instagram.com/embed.js"></script>
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
				echo "<p> Number of likes: ";
				// This is where we can get information from within $response which is a Multidimensional array
				// I went ahead and ran $ php index.php in the terminal to get an idea of where the data is and how to access it
				// var_export will give a stringified version of the variables value
				echo var_export($response["data"][0]["likes"]["count"]); // this will give us access to the number of liked on my most recent post
				echo " <a href=";
				echo var_export($response["data"][0]["link"]); // this returns the link of the most recent post
				echo ">"; 
				echo "Link to the post";
				echo "</a>";
				echo "</p>"; // Here we end the paragraph tag
			 ?>
		</div>
		<h1>Problem 2</h1>
		<div class="problem"> Use php or javascript to output the language names (e.g., German, English) from this url (http://gmc.lingotek.com/language). </div>
		<h4> Lingotek Languages </h4>
		<div class="lingotek-languages">Click to see languages</div>
		<!-- here we include jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- and our javascript file -->
		<script src="index.js"></script>
	</body>
</html>