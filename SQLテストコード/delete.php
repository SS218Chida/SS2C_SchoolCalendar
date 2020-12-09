<html>
<head>
<title>PHP TEST</title>
</head>

<body>

<?php

function quote_smart($value)
{
    // 数値以外をクオートする
    if (!is_numeric($value)) {
        $value = "'" . mysql_real_escape_string($value) . "'";
    }
    return $value;
}

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('接続失敗です。'.mysql_error());
}

print('<p>接続に成功しました。</p>');

$db_selected = mysql_select_db('test', $link);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
}

print('<p>classtblデータベースを選択しました。</p>');

mysql_set_charset('utf8');

print('<p>データを削除します。</p>');

$id = $_REQUEST['classid'];;

$sql = sprintf("DELETE FROM classtbl WHERE classid = %s"
         , quote_smart($id));

$result_flag = mysql_query($sql);

if (!$result_flag) {
    die('DELETEクエリーが失敗しました。'.mysql_error());
}

print('<p>削除後のデータを取得します。</p>');

$result = mysql_query('SELECT classid,class FROM classtbl');
if (!$result) {
    die('SELECTクエリーが失敗しました。'.mysql_error());
}

while ($row = mysql_fetch_assoc($result)) {
    print('<p>');
    print('classid='.$row['classid']);
    print(',class='.$row['class']);
    print('</p>');
}

$close_flag = mysql_close($link);

if ($close_flag){
    print('<p>切断に成功しました。</p>');
}

?>
</body>
</html>