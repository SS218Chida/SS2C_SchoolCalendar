<?php
    
    //MySQLに接続

$link = mysql_connect('localhost', 'root', '');
    
if (!$link) {
    die('接続失敗です。'.mysql_error());
}
    
    //データベースに接続
    
$db_selected = mysql_select_db('test', $link);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
}

print('<p>接続に成功しました。</p>');
    
print('<p>testデータベースを選択しました。</p>');
    
    //テーブル選択、データ抜き出し
    
    mysql_set_charset('utf8');
    
    $result = mysql_query('SET NAMES utf8', $link);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}
$classid   = $_REQUEST['classid'];
$class = $_REQUEST['class'];

$result = mysql_query("INSERT INTO classtbl(classid,class) VALUES('$classid', '$class')", $link);
if (!$result) {
  exit('データを登録できませんでした。');
}

$link = mysql_close($link);
if (!$link) {
  exit('データベースとの接続を閉じられませんでした。');
}
?>