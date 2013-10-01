<?php
//here our project's configurations will be set

$site_title="OCCWCC: Online C Compiler with Cloud Computing";
$bgcolor="#A8C2D2" ;  //#323232";// earlier it was 323232";
$host="localhost";
$db_user="root";
$db_pass="asdfgh";
$db_name="OCCWCC";
$ip=$_SERVER['REMOTE_ADDR'];
$header="<h1> Welcome to OCCWCC</h1>";
$source=htmlentities($_POST['source'],ENT_QUOTES);

echo '<style type="text/css">
<!--
    
    
    #footer {
        text-align: center;
        font-size: 80%;
        color: #000000;
    }
    #footer a{
        color: #1F1C5B;
    }
   
    -->
    </style>';
?>
