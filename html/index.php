<?php
 include_once 'simple_html_dom.php';
 $html = file_get_html('https://www.acmicpc.net/user/jaejin0209');
 $ret = $html->find(div[class="panel-body"]);
 print($ret);
}
?>
