<?php

	if(isset($_POST['submit'])){ //if submit button has been clicked, continue

		//strip the input for harmful tags
		$name=strip_tags($_POST['name']);
		$artist=strip_tags($_POST['artist']);
		$album=strip_tags($_POST['album']);
		$year=strip_tags($_POST['year']);
		$genre=$_POST['genre'];
		$rating=$_POST['rating'];
		$error=false;
		$found = false;
			
			//if the variables are not empty, check that the user inputted valid inputs, if they are empty, continue
			if($name!=""){
				if(!preg_match("/((^([A-Z]+[a-z]*[A-Za-z0-9'\s]*)$)|(^([A-Za-z0-9'\s]*[A-Z]+[a-z]*[A-Za-z0-9'\s]*)$))/", $name)){
					$error=true;
					echo("<p><span class=\"error\">ERROR:</span> The <em>Name</em> you entered is not in the correct format, it 
					should at least contain a capital letter followed by 
					non capitalized letters. Only letters and numbers are allowed.</p>");
					}
			}
			
			if($artist!=""){
				if(!preg_match("/((^([A-Z]+[a-z]*[A-Za-z0-9'\s]*)$)|(^([A-Za-z0-9'\s]*[A-Z]+[a-z]*[A-Za-z0-9'\s]*)$))/", $artist)){
					$error=true;
					echo("<p><span class=\"error\">ERROR:</span> The <em>Artist</em> you entered is not in the correct format, 
					it should at least contain a capital letter followed by 
					non capitalized letters. Only letters and numbers are allowed.</p>");
				}
			}
		
			if($album!=""){
				if(!preg_match("/((^([A-Z]+[a-z]*[A-Za-z0-9'\s]*)$)|(^([A-Za-z0-9'\s]*[A-Z]+[a-z]*[A-Za-z0-9'\s]*)$))/", $album)){
					$error=true;
					echo("<p><span class=\"error\">ERROR:</span> The <em>Album</em> you entered is not in the correct format, 
					it should at least contain a capital letter followed by 
					non capitalized letters. Only letters and numbers are allowed.</p>");
				}
			}

			if($year!=""){
				if(!preg_match("/^[1-2]{1}[0-9]{3}/", $year)){
					$error=true;
					echo("<p><span class=\"error\">ERROR:</span> The <em>Year</em> you entered is not in the correct format, 
					it should only contain four numbers.</p>");
					}
			}
		
			if($error==true){ //if there is an error require the form again so user can change their input
				require("songsearch.php");
			}else{
				echo("<p>Your search returned the following:<br/><br/></p>");
				$file = fopen("data.txt","a+");
				
				
					while(!feof($file)){
						$line = fgets($file);
						$array = explode(";",$line);
						$name1=preg_match("/$name/", $array[0]);
						$artist1=preg_match("/$artist/", $array[1]);
						$album1=preg_match("/$album/", $array[2]);
						$year1=preg_match("/$year/", $array[3]);
						$genre1=preg_match("/$genre/", $array[4]);
						$rating1=preg_match("/$rating/", $array[5]);
							
							//if there is a song in the database that matches the requirements, output it and set found to true
							if($name1 && $artist1 && $album1 && $year1 && $genre1 && $rating1){
							$found=true;
							$array1 = explode(";",$line);
							echo("<p class=\"results\">\"$array1[0]\" by $array1[1] from the album $array1[2], $array1[3]<br/>
							<em>Genre: $array1[4], Rating: $array1[5]</em><br/><br/></p>");		
							}
					}
			
					if($found==false){ //if the song was not found, output error message
					echo("<p>There were no matches.<br/><br/></p>");
					fclose($file);
				}
				}
				echo("<p>Click <a href=\"search.php\">here</a> to go back and search again!<br/><br/></p>");

	}else{ //if submit has not been clicked require the form
		require("songsearch.php");
	}
	
