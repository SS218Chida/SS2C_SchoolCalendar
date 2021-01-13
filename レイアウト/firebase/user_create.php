<!--http://localhost/schoolCurry-->
<!--
phpでhtmlを書く： https://techacademy.jp/magazine/19156
-->

<?php

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
	
	//SQL作成
	$sql = $pdo->prepare("SELECT class FROM class_tbl");

	//クエリ実行
	$result = $sql->execute();

	$sql1 = $pdo->prepare("SELECT subject FROM subject_tbl");

	$result1 = $sql1->execute();

} catch (PDOException $e) {
    // エラー内容を表示する
    var_dump($e->getMessage()); 
    exit; // プログラムを終了させる
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8" />

	<script src="https://www.gstatic.com/firebasejs/6.3.4/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.3.4/firebase-firestore.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-messaging.js"></script>
	<!-- The core Firebase JS SDK is always required and must be listed first -->

	<style>
		h1 {
			text-align: center;
		}

		/* Form Layout */
		.form-wrapper {
			background: #fafafa;
			margin: 3em auto;
			padding: 0 1em;
			max-width: 85%;
		}

		form {
			background-color: #eaeaea;
			padding: 30px 50px;
		}

		form dl dt {
			width: 200px;
			padding: 10px 0;
			float: left;
			clear: both;
		}

		form dl dd {
			padding: 10px 0;
		}

		.input1 {
			width: 50%;
		}

		.checkbox {
			width: 20px;
		}

		.button_wrapper {
			text-align: center;
		}

		.btn {
			width: 100px;
		}

	</style>
</head>

<body onload="onGet()">
	<A href="index.html">←</A>
	<h1>ユーザ作成</h1>
	<div class="form-wrapper">
		<dl>
			<div class="innn">
				<dt>ユーザネーム</dt>
				<dd><input type="text" id="name" name="name" class="name input1"></dd>
			</div>
			<div class="innn">
				<dt>メールアドレス</dt>
				<dd><input type="email" id="mail" name="email" class="email input1"></dd>
			</div>
			<div>
				<dt>パスワード</dt>
				<dd><input type="password" id="pass1" name="pass" class="pass input1"></dd>
			</div>
			<div>
				<dt>パスワード確認</dt>
				<dd><input type="password" id="pass2" name="pass" class="pass input1"></dd>
			</div>
			<div class="innn">
				<!--クラスを選択するとこ-->
				<dt>クラス選択</dt>
			</div>
			<div class="innn">
				<dd>
					<!--プルダウンの値入力するとこ-->
					<select name="class">
						<?php foreach ($sql as $value) { ?>
							<option value="<?php echo htmlspecialchars($value["class"], ENT_QUOTES, "UTF-8"); ?>">
								<?php echo htmlspecialchars($value["class"], ENT_QUOTES, "UTF-8"); ?>
							</option>
						<?php } ?>
					</select>
				</dd>
			</div>
			<div class="innn">
				<!--科目を選択するとこ-->
				<dt>科目選択</dt>
				<dd>
					<!--チェックボックス-->
					<?php foreach ($sql1 as $value) { ?>
									<tr>
										<th><input type="checkbox" name="subject" 
											value="<?php echo htmlspecialchars($value["subject"], ENT_QUOTES, "UTF-8"); ?>"></th>
											<td><?php echo htmlspecialchars($value["subject"], ENT_QUOTES, "UTF-8"); ?></td>
									</tr>
							<?php } ?>
				</dd>
			</div>
			<div class="innn">

				<!--先生or生徒　選択するとこ-->
				<dt>あなたはどちらですか？</dt>
				<dd>
					<input type="radio" name="contact" value="生徒" checked="" class="radio">生徒
					<input type="radio" name="contact" value="先生" class="radio">先生
				</dd>
			</div>
			<!--WBSの備考に使えそう-->
			<!--
        <dt>メッセージ</dt>
        <dd><textarea name="message" class="message"></textarea></dd>
-->
		</dl>
		<div class="button_wrapper">
			<button type="submit" id="btn1" class="btn" onclick="doSet()">作成</button>
			<button type="submit" class="btn" onclick="location.href='index.html'">キャンセル</button>
		</div>



	</div>
		<!--
    <table>
      <tr>
        <th>ID</th>
        <td><input type="text" id="id" /></td>
      </tr>
      <tr>
        <th>ユーザ名</th>
        <td><input type="text" id="name" /></td>
      </tr>
      <tr>
        <th>E-mail</th>
        <td><input type="text" id="mail" /></td>
      </tr>
      <tr>
        <th>パスワード</th>
        <td><input type="text" id="pass1" /></td>
      </tr>
      <tr>
        <th>パスワード確認</th>
        <td><input type="text" id="pass2" /></td>
      </tr>
      <td><button onclick="doSet()">Set</button></td>
    </table>
-->

		<!--    <ol id="list"></ol>-->
		<script src="user_create.js"></script>

</body>

</html>
