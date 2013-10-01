<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "<h1>$header</h1>";
require 'header.php';
?>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["myForm"]["name"].value
if (x==null || x=="")
  {
  alert("Name must be filled out");
  return false;
  }
var illegalChars = /\W/;
// allow only letters, numbers, and underscores
if (illegalChars.test(x)) {
   alert("The username contains illegal characters.");
    return false;
}

var a=document.forms["myForm"]["rollno"].value
if (a==null || a=="")
  {
  alert("Rollno must be filled out");
  return false;
  }
if(isNaN(a)||a.indexOf(" ")!=-1)
           {
              alert("Enter numeric value in Roll no");
              return false; 
           }
if ((a.length < 10) || (a.length > 11)) 
  {
  alert("The rollno is the wrong length.");
  return false;
  }

var b=document.forms["myForm"]["pass"].value
if (b==null || b=="")
  {
  alert("Password cannot be blank");
  return false;
}
var c=document.forms["myForm"]["pass1"].value
if (c!=b)
  {
  alert("password not matches");
  return false;
  }


var extm=document.forms["myForm"]["mobno"].value
if (extm==null || extm=="")
  {
  alert("Mobile no is a mandatory field");
  return false;
  }
if ((extm.length < 10) || (extm.length > 10)) 
  {
  alert("The Mobileno is the wrong length.");
  return false;
  }
if(isNaN(extm)||extm.indexOf(" ")!=-1)
           {
              alert("Enter numeric value in Mobile no");
              return false; 
           }
var exte=document.forms["myForm"]["emailid"].value
if (exte==null || exte=="")
  {
  alert("Email ID must be filled out");
  return false;
  }
var atpos=exte.indexOf("@");
var dotpos=exte.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=exte.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }

}
</script>


<form name =myForm action=register_final.php onsubmit="return validateForm()" method= post >
Enter your name :::::::::::::::- <input type=text name=name> {apply _ in place of space in giving your full name}<br>
Enter your rollno ::::::::::::::- <input type=text name=rollno maxlength=11> {Enter your full university ID}<br>
Enter your Password :::::::::-<input type=password name=pass><br>
Enter passwd again :::::::::::-<input type=password name=pass1><br>
Enter your branch::::::::::::::-
<select name=branch>
<option >cse</option>
<option >ece</option>
</select><br />
<?php
$j=date("Y");     //here date("Y") returns current year's numeric value
echo "Enter your passing year:::::-";
echo "<select name=passyear>";          //note here to highlight that generation of year is dynamic no need to change code every year for passyear {suggestion by tiwari}
for ($i = 1; $i <= 5; $i++, $j++) 
	{   
echo "<option >$j</option>";
	}
echo "</select><br />";
/* Emailid verification one of the try
var emailFilter=/^.+@.+\..{2,3,4,6}$/;
if ((emailFilter.test(exte)))
  { 
      alert("Please enter a valid email address.");
     	return false;		}
*/
?>
Enter your mobile no:::::::::-<input type=text name=mobno maxlength=10>{Don't append 0 before mobile number}<br>
Enter your email Id :::::::::::-<input type=text name=emailid length=60 ><br>
<input type=submit value='Register'>
</form>
<?php
require 'footer.php';
?>
</body>
</html>
