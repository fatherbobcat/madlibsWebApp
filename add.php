<!---This is the form that the user uses to add songs to the database. It is required in addsong.php which
processes the input, and is required by action.php in turn, which is the page that allows for adding songs-->
<form action="action.php" method="post">
<fieldset>

<legend>Add a song to the Database!</legend> 

<ol>
<li><label>Song Name</label><input type="text" name="name"/></li>

<li><label>Artist Name</label><input type="text" name="artist"/></li>

<li><label>Album Name</label><input type="text" name="album"/></li>

<li><label>Year of Song</label><input type="text" name="year"/></li>

<li>Song Genre<select name="genre">
<option value="Soul">Soul</option>
<option value="Pop">Pop</option>
<option value="Blues">Blues</option>
<option value="Rock">Rock</option>
<option value="Traditional">Traditional</option>
<option value="Musical">Musical</option>
<option value="Other">Other</option>
</select></li>

<li>Rating<select name="rating">
<option value="1">1 (Very Bad)</option>
<option value="2">2 (Poor)</option>
<option value="3">3 (Good)</option>
<option value="4">4 (Great)</option>
<option value="5">5 (Excellent)</option>
</select></li>
</ol>

<input type="submit" value="Add Song!" name="submit"/>
<input type = "reset" value="Try Again"/>

</fieldset>
</form>