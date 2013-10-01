<html>
<head>
<?php 
require 'settings.php';

echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo " $header";
require 'fac_header.php';
?>
<h3> C Compiler </h3>

<form action="faculty_upload_c.php" method="post"
enctype="multipart/form-data">
<label for="file">Choose a C file to Compile </label>
<input type="file" name="file" id="file" /> 
<input type="submit" name="submit" value="Submit and Compile" />
</form>

<form action="faculty_c_compile.php" method="post" >
<textarea name="source" cols="60" rows="20"></textarea>
<input type="submit" value="Compile">
</form> 

<?php
require 'faculty_footer.php';
?>
</body>
</html>
