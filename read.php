<?php 

//This file is required in songs.php and it reads and outputs the songs written in the textfile

$file = fopen("data.txt","a+");

echo("<p>The songs are in the following configuration:<br/><br/>
\"<span class=\"example\">Song Name</span>\" by <span class=\"example\">Artist</span> from the album 
<span class=\"example\">Album Name</span>, <span class=\"example\">Year Album Published</span><br/>
<em>Genre: <span class=\"example\">Song Genre</span>, Rating: <span class=\"example\">Rating</span> 
from 1-5 of the Song, 5 being highest.</em><br/><br/></p>");

echo("<h3>List of Songs</h3>");

echo("<ol>"); //makes a list of the songs in the database

while(!feof($file)){
	$line = fgets($file);
	$array = explode(";",$line);
	echo("<li class=\"first\">\"$array[0]\" by $array[1] from the album $array[2], $array[3]<br/>
	<em>Genre: $array[4], Rating: $array[5]</em><br/><br/></li>");
	
	//in the CSS I have the entries in different colors, alternating pink and tan, so I have to 
	//check if there are further entries again, ie, if there are only an odd number of songs, don't
	//write another <li>
	if(!feof($file)){
		$line1 = fgets($file);
		$array1 = explode(";",$line1);
		echo("<li class=\"second\">\"$array1[0]\" by $array1[1] from the album $array1[2], $array1[3]<br/>
		<em>Genre: $array1[4], Rating: $array1[5]</em><br/><br/></li>");
		}
	}
	
echo("</ol>");

fclose($file);
?>