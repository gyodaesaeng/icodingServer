<?php
 include "Snoopy.class.php";
 $o="";
 $snoopy = new Snoopy;
 $snoopy->fetch("https://www.acmicpc.net/user/jaejin0209");
 $txt=$snoopy->results;
 $rex="/\<div class=\"panel-body\"\>*\<\/div\>/";
 preg_match_all($rex,$txt,$o);
 print_r($o[0][0]);
?>
