<?php
 include "Snoopy.class.php";
 $o="";
 $snoopy = new Snoopy;
 $snoopy->fetch("https://www.acmicpc.net/user/jaejin0209");
 $txt=$snoopy->results;
 var_dump($txt);
 $rex="/\<span class=\"problem_number\"\>(.*)\<\/span\>/";
 preg_match_all($rex,$txt,$o);
 var_dump($o);
?>
