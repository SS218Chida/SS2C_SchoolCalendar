<html>

<head>
    <title>PHP TEST</title>
</head>

<body>

    <?php
//    
//    //MySQLに接続
//
//$link = mysql_connect('localhost', 'root', '');
//    
//if (!$link) {
//    die('接続失敗です。'.mysql_error());
//}
//    
//    //データベースに接続
//    
//$db_selected = mysql_select_db('test', $link);
//if (!$db_selected){
//    die('データベース選択失敗です。'.mysql_error());
//}
//
//print('<p>接続に成功しました。</p>');
//    
//print('<p>testデータベースを選択しました。</p>');
//    
//    //テーブル選択、データ抜き出し
//    
//    mysql_set_charset('utf8');
//    
//    $result = mysql_query('SET NAMES utf8', $link);
//if (!$result) {
//  exit('文字コードを指定できませんでした。');
//}
//$classid   = $_REQUEST['classid'];
//$class = $_REQUEST['class'];
//
//$result = mysql_query("INSERT INTO classtbl(classid,class) VALUES('$classid', '$class')", $link);
//if (!$result) {
//  exit('データを登録できませんでした。');
//}
//
//$link = mysql_close($link);
//if (!$link) {
//  exit('データベースとの接続を閉じられませんでした。');
//}

//    //classtblからデータを取り出す
//$result = mysql_query('SELECT classid,class FROM classtbl');
//if (!$result) {
//    die('クエリーが失敗しました。'.mysql_error());
//}
//
//    //表示処理
//while ($row = mysql_fetch_assoc($result)) {
//    print('<p>');
//    print('classid='.$row['classid']);
//    print(',class='.$row['class']);
//    print('</p>');
//}
//    
//    $result = mysql_query('SELECT userid,classid,username FROM usertbl');
//if (!$result) {
//    die('クエリーが失敗しました。'.mysql_error());
//}
//
//while ($row = mysql_fetch_assoc($result)) {
//    print('<p>');
//    print('userid='.$row['userid']);
//    print(',classid='.$row['classid']);
//    print(',username='.$row['username']);
//    print('</p>');
//}
    ?>
    <div id="post_page">
        <form method="post" action="result.php" id="AjaxForm">
            <div>classid <input type="text" name="classid" size="30"></div>
            <div>class <input type="text" name="class" size="30"></div>
            <div><input type="submit" name="submit" value="インサート" class="button"></div>
        </form>
    </div>
    <div id="post_page">
        <form method="post" action="delete.php">
            <div>classidを入力<input type="text" name="classid" size="30"></div>
            <div><input type="submit" name="submit" value="削除" class="button"></div>
        </form>
    </div>

    <?php

// MySQLに対する処理
//
//$close_flag = mysql_close($link);
//
//if ($close_flag){
//    print('<p>切断に成功しました。</p>');
//}
    ?>

    <script>
        $('#AjaxForm').submit(function(event) {
            // HTMLでの送信をキャンセル
            event.preventDefault();
            var $form = $(this);
            var $button = $form.find('.submit');
            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: $form.serialize(),
                timeout: 10000, // 単位はミリ秒
                // 送信前
                beforeSend: function(xhr, settings) {
                    // ボタンを無効化し、二重送信を防止
                    $button.attr('disabled', true);
                    $("#result").text("")
                },
                // 応答後
                complete: function(xhr, textStatus) {
                    // ボタンを有効化し、再送信を許可
                    $button.attr('disabled', false);
                },
                // 通信成功時の処理
                success: function(result, textStatus, xhr) {
                    // 入力値を初期化
                    $form[0].reset();
                    $("#result").append(result);
                },
                // 通信失敗時の処理
                error: function(xhr, textStatus, error) {
                    alert('エラー暫くたってからお試しください。');
                }
            });
            // …
        });

    </script>

</body>

</html>
