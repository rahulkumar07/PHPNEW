<?php
/**
 * GeSHi example script
 * Just point your browser at this script (with geshi.php in the parent directory,
 * and the language files in subdirectory "../geshi/")
 */

header('Content-Type: text/html; charset=utf-8');

error_reporting(E_ALL);

// Rudimentary checking of where GeSHi is. In a default install it will be in ../, but
// it could be in the current directory if the include_path is set. There's nowhere else
// we can reasonably guess.
if (is_readable('../geshi.php')) 
	{
    	   $path = '../';
	}
elseif (is_readable('geshi.php'))
	{
	   $path = './';
	} 
else 	{
    die('Could not find geshi.php - make sure it is in your include path!');
	}

require $path . 'geshi.php';

$fill_source = false;
if (isset($_POST['submit'])) {
    if (get_magic_quotes_gpc()) {
        $_POST['source'] = stripslashes($_POST['source']);
    }
    if (!strlen(trim($_POST['source']))) {
        $_POST['language'] = preg_replace('#[^a-zA-Z0-9\-_]#', '', $_POST['language']);
        $_POST['source'] = implode('', @file($path . 'geshi/' . $_POST['language'] . '.php'));
        $_POST['language'] = 'php';
    } else {
        $fill_source = true;
    }

    $geshi = new GeSHi($_POST['source'], $_POST['language']);

    // Use the PRE_VALID header. This means less output source since we don't have to output &nbsp;
    // everywhere. Of course it also means you can't set the tab width.
    // HEADER_PRE_VALID puts the <pre> tag inside the list items (<li>) thus producing valid HTML markup.
    // HEADER_PRE puts the <pre> tag around the list (<ol>) which is invalid in HTML 4 and XHTML 1
    // HEADER_DIV puts a <div> tag arount the list (valid!) but needs to replace whitespaces with &nbsp
    //            thus producing much larger overhead. You can set the tab width though.
    $geshi->set_header_type(GESHI_HEADER_PRE_VALID);

    // Enable CSS classes. You can use get_stylesheet() to output a stylesheet for your code. Using
    // CSS classes results in much less output source.
    $geshi->enable_classes();

    // Enable line numbers. We want fancy line numbers, and we want every 5th line number to be fancy
    $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 5);

    // Set the style for the PRE around the code. The line numbers are contained within this box (not
    // XHTML compliant btw, but if you are liberally minded about these things then you'll appreciate
    // the reduced source output).
    $geshi->set_overall_style('font: normal normal 90% monospace; color: #000066; border: 1px solid #d0d0d0; background-color: #f0f0f0;', false);

    // Set the style for line numbers. In order to get style for line numbers working, the <li> element
    // is being styled. This means that the code on the line will also be styled, and most of the time
    // you don't want this. So the set_code_style reverts styles for the line (by using a <div> on the line).
    // So the source output looks like this:
    //
    // <pre style="[set_overall_style styles]"><ol>
    // <li style="[set_line_style styles]"><div style="[set_code_style styles]>...</div></li>
    // ...
    // </ol></pre>
    $geshi->set_line_style('color: #003030;', 'font-weight: bold; color: #006060;', true);
    $geshi->set_code_style('color: #000020;', true);

    // Styles for hyperlinks in the code. GESHI_LINK for default styles, GESHI_HOVER for hover style etc...
    // note that classes must be enabled for this to work.
    $geshi->set_link_styles(GESHI_LINK, 'color: #000060;');
    $geshi->set_link_styles(GESHI_HOVER, 'background-color: #f0f000;');

    // Use the header/footer functionality. This puts a div with content within the PRE element, so it is
    // affected by the styles set by set_overall_style. So if the PRE has a border then the header/footer will
    // appear inside it.
    $geshi->set_header_content('<SPEED> <TIME> GeSHi &copy; 2011 - till now from OCCWCC');
    $geshi->set_header_content_style('font-family: sans-serif; color: #808080; font-size: 70%; font-weight: bold; background-color: #f0f0ff; border-bottom: 1px solid #d0d0d0; padding: 2px;');

    // You can use <TIME> and <VERSION> as placeholders
    $geshi->set_footer_content('Parsed in <TIME> seconds at <SPEED>, using GeSHi ');
    $geshi->set_footer_content_style('font-family: sans-serif; color: #808080; font-size: 70%; font-weight: bold; background-color: #f0f0ff; border-top: 1px solid #d0d0d0; padding: 2px;');
} else {
    // make sure we don't preselect any language
    $_POST['language'] = null;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php
require 'settings.php';
echo "<title>$site_title </title>";

?>
    <style type="text/css">
<!--
    <?php
    if (isset($_POST['submit'])) {
        // Output the stylesheet. Note it doesn't output the <style> tag
        echo $geshi->get_stylesheet(true);
    }
    ?>
    html {
        background-color: #AFAFAF;
    }
    body {
        font-family: Verdana, Arial, serif;
        margin: 10px;
        border: 2px solid #e0e0e0;
        background-color: #fcfcfc;
        padding: 5px;
    }
  h1 {
        margin: .1em 0 .2em .5em;
        border-bottom: 1px solid #b0b0b0;
        color: #000000;
        font-weight: normal;
        font-size: 150%;
    }
    h2 {
        margin: .1em 0 .2em .5em;
        border-bottom: 1px solid #b0b0b0;
        color: #000000;
        font-weight: normal;
        font-size: 150%;
    }
    h3 {
        margin: .1em 0 .2em .5em;
        color: #000000;
        font-weight: normal;
        font-size: 120%;
    }
    #footer {
        text-align: center;
        font-size: 80%;
        color: #000000;
    }
    #footer a{
        color: #1F1C5B;
    }
    textarea {
        border: 1px solid #b0b0b0;
        font-size: 90%;
        color: #333;
        margin-left: 120px;
    }
    select, input {
        margin-left: 20px;
    }
    p {
        font-size: 90%;
        margin-left: .5em;
    }
    -->
    </style>
</head>
<body>
<h1>Welcome to OCCWCC</h1>
<?php
require 'header.php';
?>
<script type="text/javascript" src="./myForm.js"></script>
<!--<p>To use this script, make sure that <strong>geshi.php</strong> is in the parent directory or in your
include_path, and that the language files are in a subdirectory of GeSHi's directory called <strong>geshi/</strong>.</p>
<p>Enter your source and a language to highlight the source in and submit, or just choose a language to
have that language file highlighted in PHP.</p>-->
<?php
if (isset($_POST['submit'])) {
    // The fun part :)
    echo $geshi->parse_code();
    echo '<hr />';
}
?>
<form name=myForm onsubmit="return validateForm()" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
<h3>Write Source to highlight or Compile</h3>
<p>
<textarea rows="10" cols="60" name="source" id="source"><?php echo $fill_source ? htmlspecialchars($_POST['source']) : '' ?></textarea>
</p>






<?php
if (isset($_POST['submit'])&& ($_POST['language'] == 'c'))
	{
$filename=rand();
$file="$filename.c";
echo "Your C file generated is $file ..... 
<br>Click on filename to  download your file ...<a href=$file  >$file </a><br>";
$fp=fopen($file, "w");
$data=$_POST['source'];
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

echo "<br/>";

echo "<form action=submit_c.php method= post >";
echo "And your output/error is ::: <br>";
echo "<textarea name=outnerr cols=60 rows=2 readonly=readonly>$outnerr</textarea><br>";

echo "</form> ";
	}
?>





<?php
if (isset($_POST['submit'])&& ($_POST['language'] == 'cpp'))
	{
$filename=rand();
$file="$filename.cpp";
echo "Your C++ file generated is $file ..... 
<br>Click on filename to  download your file ...<a href=$file  >$file </a><br>";
$fp=fopen($file, "w");
$data=$_POST['source'];
fwrite($fp, $data);
fclose($file);
echo `g++ -o $filename $file 2> $filename.err `;
$ex=`g++ -o $filename $file ;echo $?`;
echo "<br>";
if ($ex==0){ 
echo "your executable file is on <a href=$filename> $filename </a> <br>";}
$out= `./$filename`; 
$ercc=  `cat $filename.err`;
$outnerr=$ercc . $out;

echo "<br/>";

echo "<form action=submit_cpp.php method= post >";
echo "And your output/error is ::: <br>";
echo "<textarea name=outnerr cols=60 rows=2 readonly=readonly>$outnerr</textarea><br>";

echo "</form> ";
	}
?>





















<h3>Choose a language</h3>
<p>
<select name="language" id="language">
<?php
if (!($dir = @opendir(dirname(__FILE__) . '/geshi'))) {
    if (!($dir = @opendir(dirname(__FILE__) . '/../geshi'))) {
        echo '<option>No languages available!</option>';
    }
}
$languages = array();
while ($file = readdir($dir)) {
    if ( $file[0] == '.' || strpos($file, '.', 1) === false) {
        continue;
    }
    $lang = substr($file, 0,  strpos($file, '.'));
    $languages[] = $lang;
}
closedir($dir);
sort($languages);
foreach ($languages as $lang) {
    if (isset($_POST['language']) && $_POST['language'] == $lang) {
        $selected = 'selected="selected"';
    } else {
        $selected = '';
    }
    echo '<option value="' . $lang . '" '. $selected .'>' . $lang . "</option>\n";
}

?>
</select>
</p>



<p>
<input type="submit" name="submit" value="Highlight Source or Compile" />
<input type="submit" name="clear" onclick="document.getElementById('source').value='';document.getElementById('language').value='';return false" value="clear" />
</p>

</form>

<div id="footer">OCCWCC &copy; Developed By <a href="http://rahul.aitdelhi.net">Rahul</a>,Anurag,Yogesh & Naveen and released under the GNU GPL<br />
For a better future of college students.... Visit us at <a href="http://bizfromait.co.nr">BIZfromAIT</a><br>
We are on SourceForge at <a href="http://occwcc.sf.net">OCCWCC</a>
</div>
</body>
</html>
