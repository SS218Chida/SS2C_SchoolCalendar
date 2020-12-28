<?php
session_start();

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
echo '接続に成功しました';
//データ取りだし
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];

//SQL作成
$sqlsubject = $pdo->prepare("SELECT MAX(subject_id) FROM subject_tbl");

//クエリ実行
$id1 = $sqlsubject->execute();

if($subject1 === "" && $subject2 === ""){//どちらも入力されない
    break;//何もしない
}else if($subject1 !== "" && $subject2 === ""){//class1だけが入力されてる class1だけ追加
    
    while ($row = $sqlsubject->fetch()){
    $subject_id1 = $row[0] + 1;
    //SQL文を作成
    $stmt = $pdo->prepare('INSERT INTO subject_tbl(subject_id,subject) VALUES(:subject_id1,:subject1)');
    $stmt->bindValue(':subject_id1',$subject_id1,PDO::PARAM_INT);
    $stmt->bindValue(':subject1',$subject1,PDO::PARAM_STR);
    //クエリ実行
    $stmt->execute();
    }
    
}else if($subject1 !== "" && $subject2 !== ""){//どちらも入力されている
    
    while ($row = $sqlsubject->fetch()){
    $subject_id1 = $row[0] + 1;
    $subject_id2 = $row[0] + 2;
    //SQL文を作成
    $stmt = $pdo->prepare('INSERT INTO subject_tbl(subject_id,subject) VALUES(:subject_id1,:subject1)
    ,(:subject_id2,:subject2)');
    $stmt->bindValue(':subject_id1',$subject_id1,PDO::PARAM_INT);
    $stmt->bindValue(':subject1',$subject1,PDO::PARAM_STR);
    $stmt->bindValue(':subject_id2',$subject_id2,PDO::PARAM_INT);
    $stmt->bindValue(':subject2',$subject2,PDO::PARAM_STR);
    //クエリ実行
    $stmt->execute();
    }
    
}


