
<!-- Paste this code into an external JavaScript file named: validNum.js  -->

/* This script and many more are available free online at
The JavaScript Source :: http://javascript.internet.com
Created by: Manzi Olivier :: http://www.imanzi.com/ */

// calculate the ASCII code of the given character
function CalcKeyCode(aChar) {
  var character = aChar.substring(0,1);
  var code = aChar.charCodeAt(0);
  return code;
}

function checkNumber(val) {
  var strPass = val.value;
  var strLength = strPass.length;
  var lchar = val.value.charAt((strLength) - 1);
  var cCode = CalcKeyCode(lchar);

  /* Check if the keyed in character is a number
     do you want alphabetic UPPERCASE only ?
     or lower case only just check their respective
     codes and replace the 48 and 57 */

  if (cCode < 48 || cCode > 57 ) {
    var myNumber = val.value.substring(0, (strLength) - 1);
    val.value = myNumber;
  }
  return false;
}



<!-- Paste this code into the HEAD section of your HTML document.
     You may need to change the path of the file.  

<script type="text/javascript" src="validNum.js"></script>

-->

<!-- Paste this code into the BODY section of your HTML document  

<form name="myForm" method="post" action="#">
  Enter an integer here: <input name="txtNumber" type="text"
    id="txtNumber" onKeyUp="javascript:checkNumber(myForm.txtNumber);">
</form>

-->

