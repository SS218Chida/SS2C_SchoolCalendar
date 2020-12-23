<?php
//subjectClass_setting.phpから追加ボタン押したときの処理
session_start();

//データベースをPDOで接続
$pdo = new pdo("mysql:host=localhost;dbname=test","root","");
//$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

header("Content-type: text/plain;charset=UTF-8");
//データ取りだし
$class1 = $_POST['class1']; 
$class2 = $_POST['class2'];
$sql = $pdo->prepare("SELECT MAX(class_id) FROM classtbl");
//$sql = "SELECT MAX(class_id) FROM classtbl"
$id = $sql->execute();
while ($row = $sql->fetch()){
    $class_id1 = $row[0] + 1;
    $class_id2 = $row[0] + 2;
    //SQL文を作成
$stmt = $pdo->prepare('INSERT INTO classtbl(class_id,class) VALUES(:class_id1,:class1)
,(:class_id2,:class2)');
$stmt->bindValue(':class_id1',$class_id1,PDO::PARAM_INT);
$stmt->bindValue(':class1',$class1,PDO::PARAM_STR);
$stmt->bindValue(':class_id2',$class_id2,PDO::PARAM_INT);
$stmt->bindValue(':class2',$class2,PDO::PARAM_STR);
//クエリ実行
$stmt->execute();
}
