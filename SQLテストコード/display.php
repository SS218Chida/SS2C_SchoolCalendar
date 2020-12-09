<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	$db = new pdo("mysql:host=localhost;dbname=test","root","");
	$sql = "SELECT u.userid,c.class,u.username FROM usertbl AS u LEFT JOIN classtbl AS c ON u.class = c.classid";
	$ps = $db->query($sql);
?>
<body>
	<table border=1>
		<tr>
			<th>userid</th>
			<th>class</th>
            <th>username</th>
		</tr>
<?php
	while ($row = $ps->fetch()){
		echo "<tr>\n";
		for ($i = 0; $i < 3; $i++) {
			echo "<td>" . $row[$i] . "</td>\n";
		}
	}
