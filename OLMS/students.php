
<?php 
echo "<html>";
echo "<head>";
require 'settings.php';

echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';
echo '<script type="text/javascript">
function validateForm()
{
var x=document.forms["myForm"]["rollno"].value
if (x==null || x=="")
  {
  alert("RollNo cannot be left blank");
  return false;
  }
var y=document.forms["myForm"]["pass"].value
if (y==null || y=="")
  {
  alert("Password cannot be left blank");
  return false;
  }
}	</script>';
echo '<form name=myForm action=student_query.php onsubmit="return validateForm()" method=POST>';
echo "<h4>Enter your rollno::::::";
echo "<input type=text name=rollno maxlength=11><br>";
echo "Enter your Password:";
echo "<input type=password name=pass><br>";
echo "Enter your Prog name";
echo "<input type=text name=prog_name>{leave blank to display all your programs}<br>";
echo "Select Your Language";
echo "<select name=lang>";

echo "<option value=c_prog>C</option>";
echo "<option value=cpp_prog>Cpp</option>";
echo "<option value=java_prog>Java</option>";
echo "</select><br />";

echo "<input type=submit value='Go'>";
echo "</form>";

require 'footer.php';

?>
