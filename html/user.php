<form method="post">
	<input type="submit" name="update" id="update" value="update" />
	<br/>
</form>

<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include_once 'simple_html_dom.php';
	$s = mysqli_connect("localhost", "root", "dlwowls1","DB");
	$id = $_GET["id"];
	if(array_key_exists('update',$_POST)){
		$html = file_get_html("https://www.acmicpc.net/user/{$id}");
		$ret = $html->find('table id="statics"]')[0]->find('a');
		mysqli_query($s,"UPDATE USER_INFO SET CORRECT = {$ret[0]->innertext} WHERE ID='{$id}'");
		mysqli_query($s,"UPDATE USER_INFO SET SUBMIT = {$ret[1]->innertext} WHERE ID='{$id}'");
		$ret = $html->find('div[class=panel-body]');
		foreach($ret[0]->find('span[class=problem_number]') as $element){
			$n = $element->first_child()->innertext;
			if(mysqli_num_rows(mysqli_query($s,"SELECT * FROM CORRECT WHERE ID='{$id}' AND PROBLEM={$n}"))<1){
				mysqli_query($s,"INSERT INTO CORRECT VALUES('{$id}',{$n});");
			}
			if(mysqli_num_rows(mysqli_query($s,"SELECT * FROM INCORRECT WHERE ID='{$id}' AND PROBLEM={$n}"))>0){
				mysqli_query($s,"DELETE FROM INCORRECT WHERE ID='{$id}'AND PROBLEM={$n});");
			}
		}
		foreach($ret[1]->find('span[class=problem_number]') as $element){
			$n = $element->first_child()->innertext;
			if(mysqli_num_rows(mysqli_query($s,"SELECT * FROM INCORRECT WHERE ID='{$id}' AND PROBLEM={$n}"))<1){
				mysqli_query($s,"INSERT INTO INCORRECT VALUES('{$id}',{$n});");
			}
			if(mysqli_num_rows(mysqli_query($s,"SELECT * FROM CORRECT WHERE ID='{$id}' AND PROBLEM={$n}"))>0){
				mysqli_query($s,"DELETE FROM CORRECT WHERE ID='{$id}'AND PROBLEM={$n});");
			}
		}
	}
	$view = mysqli_query($s,"SELECT PROBLEM FROM CORRECT WHERE ID='{$id}' ORDER BY PROBLEM");
	while($n = mysqli_fetch_array($view)){
		echo $n[0];
		echo " ";
	}
	echo "<br>";
	$view = mysqli_query($s,"SELECT PROBLEM FROM INCORRECT WHERE ID='{$id}' ORDER BY PROBLEM");
	while($n = mysqli_fetch_array($view)){
		echo $n[0];
		echo " ";
	}
?>
