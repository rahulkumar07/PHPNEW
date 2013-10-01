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

$file=$_FILES["file"]["name"];
$ext = substr($file,  strpos($file, '.')+1);  //this subscript finds the file extension 
$finfo = finfo_open(FILEINFO_MIME_TYPE); 
$mime_type=finfo_file($finfo, $file) ; // return mime type also mimetype extension
finfo_close($finfo);
echo "You have uploaded mime type:-  $mime_type <br>";

if(!empty($file) && ($mime_type=="text/plain" || $mime_type=="text/x-c++" || $mime_type=="text/x-c" ) && ($ext=="c" || $ext=="C") ){
$filename=rand();
$data=`cat $file`;
fwrite($fp, $data);
fclose($file);
echo `gcc -o $filename $file 2> $filename.err `;
$ex=`gcc -o $filename $file ;echo $?`;
echo "<br>";
if ($ex==0){ 
echo "your executable file is on <a href=$filename> $filename </a> <br>";}
$out= `./$filename`; 
$ercc=  `cat $filename.err`;
$outnerr=$ercc . $out;
$outnerr=htmlentities($outnerr,ENT_QUOTES);
$source=htmlentities($data,ENT_QUOTES); 
echo "<br/>";

echo "<form action=submit_c.php method= post >";
echo "Yours Source code is <br>";
echo "<textarea name=source1 cols=60 rows=20 readonly=readonly>$data</textarea><br>";
echo "And your output/error is ::: <br>";
echo "<textarea name=outnerr cols=60 rows=2 readonly=readonly>$outnerr</textarea><br>";
echo "<input type=submit value='Save your Code to DB'>";
echo "</form> ";

echo "<h3>Note:- To make change to ur existing code, copy code from textarea below and paste in textarea of front page from <a href=ccompile.php>here</a><br></h3>";
echo "<textarea name=source1 cols=60 rows=20 >$data</textarea><br>";
require 'db_connect.php';
mysql_query("INSERT INTO guest_c_prog (prog_content,prog_result,ip) values ('$source','$outnerr','$ip')")or die(mysql_error()); ;

}
else{
echo "<strong>Please Enter a Valid C file</strong>";
`rm $file`;
}
require 'footer.php';

?>



</body>
</html>


