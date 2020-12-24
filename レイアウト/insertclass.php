<?php
//subjectClass_setting.phpからクラス追加ボタンが押されたときの処理
session_start();

//データベースをPDOで接続
$pdo = new pdo("mysql:host=localhost;dbname=test","root","");
//$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

header("Content-type: text/plain;charset=UTF-8");
//データ取りだし
$class1 = $_POST['class1'];
$class2 = $_POST['class2'];

//SQL作成
$sqlclass = $pdo->prepare("SELECT MAX(class_id) FROM classtbl");

//クエリ実行
$id1 = $sqlclass->execute();

if($class1 === "" && $class2 === ""){//どちらも入力されない
    break;
}else if($class1 !== "" && $class2 === ""){//class1だけが入力されてる
    //class1追加処理
    while ($row = $sqlclass->fetch()){
    $class_id1 = $row[0] + 1;
    //SQL文を作成
    $stmt = $pdo->prepare('INSERT INTO classtbl(class_id,class) VALUES(:class_id1,:class1)');
    $stmt->bindValue(':class_id1',$class_id1,PDO::PARAM_INT);
    $stmt->bindValue(':class1',$class1,PDO::PARAM_STR);
    //クエリ実行
    $stmt->execute();
    }
}else if($class1 !== "" && $class2 !== ""){//どちらも入力されてる
        //class1とclass2追加処理
 while ($row = $sqlclass->fetch()){
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
}
