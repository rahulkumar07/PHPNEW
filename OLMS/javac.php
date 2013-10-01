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
 var fup = document.getElementById('fileup');

     var fileName = fup.value;

     var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

     if(ext == "java" )

      {

                return true;

      }        

      else

      {

                alert("Upload  only .java extensions");

                 fup.focus();

                return false;

       }
}

</script>
<form action=upload_java.php onsubmit="return validateUpload()" method= post enctype= multipart/form-data >
<label for=file> Choose a java file to Compile </label>
<input type=file name= file id= fileup /> 
<input type=submit name=submit value='Compile uploaded file' />
</form>
<?php
$filename=rand();
$jfile="J$filename";
$jsource="$jfile.java";

echo '<form name=myForm action=java.php  onsubmit="return validateForm()" method= post >';
echo "<h3>To avoid name conflicting Your class name should be </h3> ";
echo "<input type=text name=ClassFile value=$jfile  ><br>";
echo "<h3> and Your source file should be named as </h3>";
echo "<input type=text name=SourceFile value=$jsource  ><br>";
echo "<textarea name=source cols=60 rows=20></textarea>";
echo "<input type=submit value=Compile>";
echo "</form> ";

require 'footer.php';
?>
<script type="text/javascript" src=validate.js ></script>
</body>
</html>

