<?php

//this processes the data from the form and is required by action.php which is the page that allows for adding songs

if(isset($_POST['submit'])){ //if the form has been submitted, continue

	//strip the input of any harmful tags
	$name=strip_tags($_POST['name']);
	$artist=strip_tags($_POST['artist']);
	$album=strip_tags($_POST['album']);
	$year=strip_tags($_POST['year']);
	$genre=$_POST['genre'];
	$rating=$_POST['rating'];
	$error = false;

		//check to see if the input is in the correct format, if it is wrong output an error message and set $error to true
		if(!preg_match("/((^([A-Z]+[a-z]*[A-Za-z0-9'\s]*)$)|(^([A-Za-z0-9'\s]*[A-Z]+[a-z]*[A-Za-z0-9'\s]*)$))/", $name)){
			$error=true;
			echo("<p><span class=\"error\">ERROR:</span> The <em>Name</em> you entered is not in the correct format, it should at least contain a capital letter followed by 
			non capitalized letters. Only letters and numbers are allowed.</p>");
		}
		
		if(!preg_match("/((^([A-Z]+[a-z]*[A-Za-z0-9'\s]*)$)|(^([A-Za-z0-9'\s]*[A-Z]+[a-z]*[A-Za-z0-9'\s]*)$))/", $artist)){
			$error=true;
			echo("<p><span class=\"error\">ERROR:</span> The <em>Artist</em> you entered is not in the correct format, it should at least contain a capital letter followed by 
			non capitalized letters. Only letters and numbers are allowed.</p>");
		}
		
		if(!preg_match("/((^([A-Z]+[a-z]*[A-Za-z0-9'\s]*)$)|(^([A-Za-z0-9'\s]*[A-Z]+[a-z]*[A-Za-z0-9'\s]*)$))/", $album)){
			$error=true;
			echo("<p><span class=\"error\">ERROR:</span> The <em>Album</em> you entered is not in the correct format, it should at least contain a capital letter followed by 
			non capitalized letters. Only letters and numbers are allowed.</p>");
		}
		
		if(!preg_match("/^[1-2]{1}[0-9]{3}/", $year)){
			$error=true;
			echo("<p><span class=\"error\">ERROR:</span> The <em>Year</em> you entered is not in the correct format, it should only contain four numbers.</p>");
		}
		
		//if there is an error require the form again so that users can fill it out again
		if($error==true){
			require("add.php");
		}else{
		//if there is no error, continue
		$array = array($name, $artist, $album, $year, $genre);
		$data = implode(";",$array);
		$file=fopen("data.txt", "a+");
		
			while(!feof($file)){
			$line = fgets($file);
			$error1=false;
				if(preg_match("/$data/", $line)){ //if there is a duplicate output error message and set $error1 to true
					$error1=true;
					echo("<p><span class=\"error\">ERROR:</span> The song you entered was a duplicate.<br/><br/>
					Click <a href=\"action.php\">here</a> to go back and add songs!<br/><br/>
					Click <a href=\"songs.php\">here</a> to view your song database!<br/><br/></p>");
				}
			}
			
			//if there is no error, add the song to the database (accounting for rating this time and output sucess message
			if($error1==false){
				$array1 = array($name, $artist, $album, $year, $genre, $rating);
				$data1 = implode(";",$array1);
				fputs($file, "\n$data1");
				fclose($file);
				echo("<p>Your song has been added!<br/><br/>
				Click <a href=\"action.php\">here</a> to go back and add songs!<br/><br/>
				Click <a href=\"songs.php\">here</a> to view your song database!<br/><br/>
				</p>");
			}
		}
	}else{ //if it has not been submitted, require the form
		require("add.php");}
	
