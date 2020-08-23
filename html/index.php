<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>CNUE</title>
    <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
      table {
        width: 100%;
      }
      th, td {
        padding: 10px;
        border-bottom: 1px solid #dadada;
      }
    </style>
  </head>
   <body>
    <table>
      <thead>
        <tr>
          <th>아이디</th>
          <th>이름</th>
          <th>상태 메시지</th>
          <th>맞은 문제</th>
          <th>제출</th>
        </tr>
      </thead>
      <tbody>
<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  $s = mysqli_connect("localhost", "root", "dlwowls1","DB");
  $id = "jaejin0209";
  $view = mysqli_query($s,"SELECT * FROM USER_INFO ORDER BY CORRECT DESC");
  while($user = mysqli_fetch_array($view)){
	   echo "<tr><td><a href='/user?id={$user['ID']}'>{$user['ID']}</a></td><td>{$user['NAME']}</td><td>{$user['STATUS_MESSAGE']}</td><td>{$user['CORRECT']}</td><td>{$user['SUBMIT']}</td></tr>";
  }
?>
</tbody>
    </table>
  </body>
</html>
