<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';
?>
<script type="text/javascript" src="./myForm.js">

</script>

<form name=myForm action=submit_bug_sug.php onsubmit="return validateForm()" method=POST>
Choose one 
 <select name=bug_sug>
 <option >Bug</option> 
 <option >Suggestion</option> 
</select><br>
<?
echo "Enter your rollno";
echo "<input type=text name=rollno maxlength=10><br>";
echo "Enter your Password";
echo "<input type=password name=pass><br>"?>
Enter report
<textarea name="source" cols="30" rows="6"></textarea>
<input type=submit value="Send to Admin">
</form>


<?
require 'footer.php';
echo "</body";
echo "</html>";
?>
