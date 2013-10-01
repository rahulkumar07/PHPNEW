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
//$mimetype=$_FILES['file']['type']; deprecated this info is provided by browser may differ browser by browser

$file=$_FILES["file"]["name"];
$ext = substr($file,  strpos($file, '.')+1); 

$finfo = finfo_open(FILEINFO_MIME_TYPE); 
$mime_type=finfo_file($finfo, $file) ; // return mime type ala mimetype extension
finfo_close($finfo);
//echo "your uploaded file's mime type is $mime_type <br>";

if(!empty($file)&& ($ext=="java") && ($mime_type=="text/x-c++" || $mime_type="text/plain" || $mime_type=="text/x-c") ){
$jclass = substr($file, 0, strrpos($file, '.'));

echo "Your JAVA source file generated is ...<a href=$file  >$file</a><br>";

echo `/usr/bin/javac $file 2> $file.err `;
$exst=`/usr/bin/javac $file ;echo $?`;

if($exst==0)
echo "Your JAVA class file generated is  ...<a href=$jclass.class  >$jclass.class </a><br>";


$data=`cat $file`;
$out= `java $jclass`; 
$err=`cat $file.err`;
$outnerr=$out . $err;
$outnerr=htmlentities($outnerr,ENT_QUOTES);
$data=htmlentities($data,ENT_QUOTES); 
echo "<br/><form action=submit_java.php method=POST>";
echo "<h3>Yours Source code is</h3>";
echo "<textarea name=source1 cols=60 rows=20 readonly=readonly> $data </textarea><br>";
echo "<h3>And your output/error is :::</h3>";
echo "<textarea name=outnerr cols=60 rows=2 readonly=readonly>$outnerr</textarea><br>";
echo "<input type=submit value='Save your Code to DB'>";
echo "</form> ";


echo "<h3>Note:- To make change to ur existing code, copy code from textarea below and paste in textarea of the page from <a href=javac.php>here</a></br>";
echo "<textarea name=source1 cols=60 rows=20 >$data</textarea><br>";

require 'db_connect.php';
mysql_query("INSERT INTO guest_java_prog(prog_content,prog_result,ip) values('$data','$outnerr','$ip')")or die(mysql_error()); ;
}
else{
echo "<strong>Please Enter a Valid java file</strong>";
`rm $file`;
}

require 'footer.php';



?>


</body>
</html>
