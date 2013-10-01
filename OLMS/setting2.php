<?php
//here our project's configurations will be set

$site_title="OCCWCC: Online C Compiler with Cloud Computing";
$bgcolor="#323232";// earlier it was 323232";
$host="192.168.115.136";
$db_user="system";
$db_pass="asdfgh";
$db_name="orc_db";
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
