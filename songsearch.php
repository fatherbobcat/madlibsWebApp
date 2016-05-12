<!--This is the form the user fills in to search for songs, it is required in searchfunct.php, 
which processes the data and is required by search.php, the page that allows for searching
within the database-->

<p>Lookup songs here!<br/><br/>
You can search through songs in the database by entering or selecting from the categories.<br/><br/>
You can put in none, one or more search keywords or options, but remember, if you put in
none, all songs in the database will come up!</p>
<form action="search.php" method="post">
<fieldset>

<legend>What Song do you want?</legend>

<ol>
<li><label>Name of Song</label><input type="text" name="name"/></li>

<li><label>Artist</label><input type="text" name="artist"/></li>

<li><label>Album</label><input type="text" name="album"/></li>

<li><label>Year</label><input type="text" name="year"/></li>

<li>Song Genre<select name="genre">
<option value="">All</option>
<option value="Soul">Soul</option>
<option value="Pop">Pop</option>
<option value="Blues">Blues</option>
<option value="Rock">Rock</option>
<option value="Traditional">Traditional</option>
<option value="Musical">Musical</option>
<option value="Other">Other</option>
</select></li>

<li>Rating<select name="rating">
<option value="">All</option>
<option value="1">1 (Very Bad)</option>
<option value="2">2 (Poor)</option>
<option value="3">3 (Good)</option>
<option value="4">4 (Great)</option>
<option value="5">5 (Excellent)</option>
</select></li>
</ol>

<input type="submit" value="Search!" name="submit"/>
<input type = "reset" value="Try Again"/>

</fieldset>
</form>