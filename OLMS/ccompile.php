<html>
<head>
<?php 
require 'settings.php';

echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo " $header";
require 'header.php';
?>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["myForm"]["source"].value
if (x==null || x=="")
  {
  alert("write something in source");
  return false;
  }

}
function validateUpload()
{
 var fup = document.getElementById('file');

     var fileName = fup.value;

     var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

     if(ext == "c" || ext == "C" )

      {

                return true;

      }        

      else

      {

                alert("Upload  only .c or .C extensions");

                 fup.focus();

                return false;

       }
}

</script>

<h3> C Compiler </h3>

<form name=myform2 action="upload_c.php" onsubmit="return validateUpload()" method="post"
enctype="multipart/form-data">
<label for="file">Choose a C file to Compile </label>
<input type="file" name="file" id="file" /> 
<input type="submit" name="submit" value="Compile uploaded file" />
</form>

<form name= myForm action="c.php" onsubmit="return validateForm()" method="post" >
<textarea name="source" cols="60" rows="20"></textarea>
<input type="submit" value="Compile">
</form> 


<?php 
require 'footer.php';
?>

</body>
</html>
