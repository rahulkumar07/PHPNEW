<?php

echo "<html>";
echo "<head>";
require 'settings.php';
echo "<title>$site_title </title>";

echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';
?>
<script type="text/javascript">
function validateForm()
{

}
function validateFac()
{
var h=document.forms["myFac"]["id"].value
if (h==null || h=="")
  {
  alert("You are not expected to leave the ID blank");
  return false;
  }
var z=document.forms["myFac"]["pass"].value
if (z==null || z=="")
  {
  alert("Please fill some value in password field");
  return false;
  }
}
</script>

 <! Note Down to close the tag otherwise you will have a problem with opera browser remove closing h1 tag to see the effect>
<h3> Register urself to save your programs permanently ...To Register click <a href=register.php > here<a></h3>

<form  name= myFac action =faculty.php onsubmit="return validateFac()" method=post>
Faculty login here::::  ID 
 <input type=text name=id >Password <input type=password name=pass> <input type="submit" value="LogIn">
</form>

<h3> View your programs <a href=students.php >here</a> {Only for students}</h3>
<h2>Before compiling any program please read instructions from <a href=instructions.php > here<a></h2>
<form action=prog_to_do.php method=POST>
Go for Today's Program to do
 <select name=prog_list>
 <option value=C>C</option> 
 <option value=C++>C++</option>
 <option value=DS>DS</option>  
 <option value=java>java</option> 
 <option value=ADA>ADA</option> 
 <option value=CG>CG</option> 
 <option value=SQL>SQL</option> 
</select>
<strong><input type=submit value=Go></strong>
</form>
<h3>View features of OCCWCC <a href=features.php > here<a></h3>
<?php
require 'footer.php';
?>
</body>
</html>
