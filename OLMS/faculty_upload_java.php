<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'fac_header.php';
?>



<?php
if ($_FILES["file"]["size"] < 500000)
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Uploaded: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";     The default tempfile is uploaded here

    if (file_exists("uploads/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      echo "    Rename ur file and upload again";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "" . $_FILES["file"]["name"]);   //here we move the file from temp directory to the current directory
      //echo "Stored in: " . "uploads/" . $_FILES["file"]["name"] . "<Br>" ;
      }
    }
  }
else
  {
  echo "Invalid file";
  }
$file=$_FILES["file"]["name"];
$jclass = substr($file, 0, strrpos($file, '.'));


echo "Your JAVA source file generated is $file .....  Click on filename to  download your  ...<a href=$file  >$file</a><br>";

echo `/usr/bin/javac $file 2> $file.err `;
$exst=`/usr/bin/javac $file ;echo $?`;

if($exst==0)
echo "Your JAVA class file generated is $jclass.class .....  Click on filename to  download your  ...<a href=$jclass.class  >$jclass.class </a><br>";


$data=`cat $file`;
$out= `java $jclass`; 
$err=`cat $file.err`;
$outnerr= $out . $err;

echo "<br/><form action=faculty_submit_java.php method=POST>";
echo "<h3>Yours Source code is</h3>";
echo "<textarea name=source1 cols=60 rows=20 readonly=readonly> $data </textarea><br>";
echo "<h3>And your output/error is :::</h3>";
echo "<textarea name=outnerr cols=60 rows=2 readonly=readonly>$outnerr</textarea><br>";
echo "<input type=submit value='Save your Code to DB'>";
echo "</form> ";


echo "<h3>Note:- To make change to ur existing code, copy code from textarea below and paste in textarea of the page from <a href=faculty_java.php>here </a>or use browser's back button</br>";
echo "<textarea name=source1 cols=60 rows=20 >$data</textarea><br>";

require 'db_connect.php';
mysql_query("INSERT INTO guest_java_prog(prog_content,prog_result,ip) values('$data','$outnerr','$ip')")or die(mysql_error()); ;

require 'faculty_footer.php';



?>


</body>
</html>
