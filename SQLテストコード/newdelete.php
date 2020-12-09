<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	$db = new pdo("mysql:host=localhost;dbname=test","root","");
    $id = $_REQUEST['classid'];
	$sql = sprintf("DELETE FROM classtbl WHERE classid = %s" , $id);
	$ps = $db->query($sql);
?>
<body>
    <echo>削除しました</echo>
    <form action="newmysql.html">
        <div><input type="submit" name="submit" value="戻る" class="button"></div>
    </form>
</body>