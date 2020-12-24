<?php
//subjectClass_setting.phpからクラス追加ボタンが押されたときの処理
session_start();

// エラー表示をonにする
error_reporting(-1);
ini_set("display_errors", 1);

// 各種、値の設定
$server_name = 'mysql149.phy.lolipop.lan';
$user_name = 'LAA1210935';
$password = 'tridentss2c';
$database_name = 'LAA1210935-sukukare';
$charset = 'utf8'; // 文字コード：MySQLのバージョンが適切なら「utf8mb4」のほうがよりよいが、一端

// XXX 一端「おまじない」だと思ってください
$opt['PDO::ATTR_EMULATE_PREPARES'] = false;

// 接続に必要な文字列を合成します
$dsn = "mysql:host={$server_name};dbname={$database_name};charset={$charset}";

// 接続処理
try {
    // データベースに接続
    $pdo = new PDO($dsn, $user_name, $password, $opt);
} catch (PDOException $e) {
    // エラー内容を表示する
    var_dump($e->getMessage()); 
    exit; // プログラムを終了させる
}
// 接続に成功したら「成功した」旨を表示
echo '接続に成功しました<br>';
var_dump($dbh);

// //データベースをPDOで接続
// $pdo = new pdo("mysql:host=localhost;dbname=test","root","");
// //$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

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
