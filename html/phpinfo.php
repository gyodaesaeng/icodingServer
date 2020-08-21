<?
 include "Snoopy.class.php";
 $snoopy = new Snoopy;
 if($snoopy->fetch("http://www.naver.com/"))
 {
  echo print_r($snoopy->results);
 }
 else
  echo "error fetching document: ".$snoopy->error."\n";
?>
