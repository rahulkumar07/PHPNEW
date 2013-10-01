function validateForm()
{

var a=document.forms["myForm"]["rollno"].value
if (a==null || a=="")
  {
  alert("Rollno must be filled out");
  return false;
  }
var b=document.forms["myForm"]["pass"].value
if (b==null || b=="")
  {
  alert("Password cannot be blank");
  return false;
 }
var c=document.forms["myForm"]["source"].value
if (c==null || c=="")
  {
  alert("Please write something in report to Send ");
  return false;
 }				

}
