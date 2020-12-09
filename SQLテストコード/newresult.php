<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	$db = new pdo("mysql:host=localhost;dbname=test","root","");
    $classid   = $_REQUEST['classid'];
    $class = $_REQUEST['class'];
	$sql = sprintf("INSERT INTO classtbl(classid,class) VALUES('$classid', '$class')");
	$ps = $db->query($sql);
?>

<body>
    <echo>追加しました</echo>
    <form action="newmysql.html">
        <div><input type="submit" name="submit" value="戻る" class="button"></div>
    </form>
</body>
