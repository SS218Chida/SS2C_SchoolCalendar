<?php
//subjectClass_setting.phpの科目追加ボタンが押されたときの処理
session_start();

//データベースをPDOで接続
$pdo = new pdo("mysql:host=localhost;dbname=test","root","");
//$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

header("Content-type: text/plain;charset=UTF-8");
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


