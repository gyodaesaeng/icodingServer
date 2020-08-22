<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
 include_once 'simple_html_dom.php';
 $s = mysqli_connect("localhost", "root", "dlwowls1","DB");
 $html = file_get_html('https://www.acmicpc.net/user/jaejin0209');
 $ret = $html->find('div[class=panel-body]');
 foreach($ret[0]->find('span[class=problem_number]') as $element){
	$n = $element->first_child()->innertext;
	if(mysqli_num_rows(mysqli_query($s,"SELECT * FROM CORRECT WHERE ID='jaejin0209' AND PROBLEM={$n}"))<1){
		mysqli_query($s,"INSERT INTO CORRECT VALUES('jaejin0209',{$n});");
	}
 }
?>
