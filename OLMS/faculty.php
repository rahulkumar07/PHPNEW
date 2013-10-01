<?php 
echo "<html>";
echo "<head>";
require 'settings.php';

echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo " $header";
require 'fac_header.php';
echo '<script type="text/javascript">
function validateForm()
{
var x=document.forms["myForm"]["prog_name"].value
if (x==null || x=="")
  {
  alert("Program name cannot be left blank");
  return false;
  }
}</script>
';
$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die('Could not select database');
$passwd=$_POST['pass'];
$id=$_POST['id'];
$quer=mysql_query("select passwd from faculty where id='$id'"); 
$quer2=mysql_query("select name from faculty where id='$id'");  
$row = mysql_fetch_row($quer);
$row2 = mysql_fetch_row($quer2);
$pass1=$row[0];
$name_fac=$row2[0];
$lang=$_POST['lang'];
//echo "you have selected $lang language <br>";   this is to check whether correct lang is selected or not
$prog_name=$_POST['prog_name'];
if(($passwd==$pass1)&& !empty($passwd)){            //Note that !empty has been put at last then every time almost both the query will run...otherwise
echo '<form name=myForm action=faculty_query.php onsubmit ="return validateForm()" method= post >';
echo "<h3>Welcome Mr. $name_fac you have logged in with id <input type=text size=2 name=fac_id readonly=readonly value=$id ></h3><br>";
echo "<strong> Insert a new Program name:</strong>";
echo "<input type=text size=40 name=prog_name ><br>";
echo " <select name=prog_list>
 <option>C</option> 
 <option>C++</option> 
 <option>DS</option> 
 <option>java</option> 
 <option>ADA</option> 
 <option>CG</option> 
 <option>SQL</option> 
</select>";
echo "<input type=submit value=submit>";
echo "</form> ";

echo "<br><strong>View student's program:::</strong>";
echo "<form action=faculty_query.php method=POST>";
echo "Enter student's  rollno";
echo "<input type=text name=rollno maxlength=11>{leave blank to display all programs of language selected below}<br>";
echo "Enter your Prog name";
echo "<input type=text name=prog_name>{leave blank to display all programs of particular student}<br>";
echo "Select Your Language";
echo "<select name=lang>";

echo "<option value=c_prog>C</option>";
echo "<option value=cpp_prog>Cpp</option>";
echo "<option value=java_prog>java</option>";
echo "</select><br />";

echo "<input type=submit value='Go'>";
echo "</form>";

echo "<br><strong>View Guest's Program:::</strong>";
echo "<form action=faculty_query2.php method=POST>";
echo "Select Your Language";

echo "<select name=lang>";
echo "<option value=guest_c_prog>C</option>";
echo "<option value=guest_cpp_prog>Cpp</option>";
echo "<option value=guest_java_prog>java</option>";
echo "</select><br />";
echo "<input type=submit value='Go'>";
echo "</form>";

echo "<br><strong>View Bugs or Suggestions:::</strong>";
echo "<form action=faculty_query2.php method=POST>";
echo "<select name=num>";
echo "<option value=bug>Bug</option>";
echo "<option value=Suggestion>Suggestions</option>";
echo "</select><br />";
echo "<input type=submit value='Go'>";
echo "</form>";

echo "<br><strong>View Student's detail:::</strong>";
echo "<form action=faculty_query2.php method=POST>";
echo "Enter students's rollno";
echo "<input type=text name=rollno size=11 > {Leave blank to see all students of particular branch and year}<br><strong>Or</strong><br>";
$j=date("Y");
echo "Select passing year -";
echo "<select name=passyear>";         
for ($i = 1; $i <= 5; $i++, $j++){ echo "<option >$j</option>"; }
echo "</select><br />";
echo "Select branch -";
echo "<select name=branch>";
echo "<option value=cse>CSE</option>";
echo "<option value=ece>ECE</option>";
echo "</select><br />";
echo "<input type=submit value='Go'>";
echo "</form>";

echo '<script type="text/javascript">
function validateForm2()
{
var x=document.forms["myForm"]["id"].value
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
echo "<strong> View Your own programs</strong>";
echo '<form name=myForm action=faculty_query3.php onsubmit="return validateForm2()" method=POST>';
echo "<input type=hidden name=id value=$id maxlength=11>";
echo "<input type=password hidden name=pass value=$passwd >";
echo "Enter your Prog name";
echo "<input type=text name=prog_name>{leave blank to display all your programs}<br>";
echo "Select Your Language";
echo "<select name=lang>";
echo "<option value=fac_c_prog>C</option>";
echo "<option value=fac_cpp_prog>Cpp</option>";
echo "<option value=fac_java_prog>Java</option>";
echo "</select><br />";

echo "<input type=submit value='Go'>";
echo "</form>";

echo "<strong> Create another faculty account</strong>";
echo '<form name =fac_create_form action=faculty_query4.php onsubmit="return validateForm3()" method =POST>';


}
else 
echo "password or ID not matches in the database or you haven't logged in yet<br>";


require 'faculty_footer.php';
?>
