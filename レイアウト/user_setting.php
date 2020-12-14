<!--http://localhost/schoolCurry-->
<!--
phpでhtmlを書く： https://techacademy.jp/magazine/19156
-->
<!DOCTYPE html>
<!--
レイアウト：https://qiita.com/chousensha01/items/ed29dd22a022aed058d9
-->

<!--チェックボックスの見た目はあとで
縦並びにすると一番上が少し左にずれて見える
今：<div class="check2">がないと□科目が横並びになる

ダイアログも後回し
今：一つずつなら入力できる
ダイアログ表示までこぎつけたぞい😏

-->
<html>

<head>
	<meta charset="UTF-8">
	<title>だいめい入力</title>
	<style>
		h1 {
			text-align: left;
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

		form dl dt1 {
			width: 200px;
			padding: 10px 0;
			float: left;
			clear: both;
		}

		form dl dd {
			padding: 10px 0;
		}

		.check-wrapper {
			position: relative;
			top: auto;
			left: 0px;
			/*			float: left;*/
			display: flex;
			flex-direction: column;
		}

		.check2 {
			/*			display: flex;*/
		}

		.input1 {
			width: 50%;
		}

		.checkbox {
			width: 20px;
		}

		.button_wrapper1 {
			text-align: right;
		}

		.button_wrapper2 {
			text-align: left;
		}

		.btn {
			width: 100px;
		}

		.btn1 {
			width: 170px;
		}

	</style>
</head>



<body>
	<h1>ユーザネームかユーザID</h1>
	<div class="form-wrapper">
		<form class="contact" action="index.html" method="post">

			<dl>
				<div class="innn">
					<dt1><button type="button" class="btn1">クラス・科目を追加する</button></dt1>
					<dd><br></dd>
				</div>

				<div class="innn">
					<dt1><input type="button" id="button_02" class="btn1" value="パスワードを変更"></dt1>
					<dd><br></dd>
				</div>

				<div class="innn">
					<!--クラスを選択するとこ-->
					<dt>クラス選択</dt>
				</div>
				<div class="innn">
					<dd>
						<!--プルダウンの値入力するとこ-->
						<select class="type input1" name="type">
							<option value="撮影のご依頼">撮影のご依頼</option>
							<option value="講演・メディア出演のご依頼">講演・メディア出演のご依頼</option>
							<option value="その他お問い合わせ">その他お問い合わせ</option>
						</select>
					</dd>
				</div>
				<div class="innn">
					<!--科目を選択するとこ-->
					<dt>科目選択</dt>
					<div class="check-wrapper">
						<dd>
							<!--チェックボックス-->
							<div class="check2"><input type="checkbox" name="subject" value="無し" checked="" 　class="checkbox">無し</div>
							<div class="check2"><input type="checkbox" name="subject" value="科目" class="checkbox">科目１</div>
							<div class="check2"><input type="checkbox" name="subject" value="科目" class="checkbox">科目１</div>
						</dd>
					</div>
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
			<div class="button_wrapper1">
				<button type="submit" class="btn">確定</button></div>
			<div class="button_wrapper2">
				<button type="button" class="btn">ログアウト</button>
			</div>
		</form>
	</div>
	

	<script type="text/javascript">
<!--
// 匿名関数内で実行
(function (){

	// ID 属性からエレメントを取得する
	var input_button = document.getElementById("button_02");
	var input_message = document.getElementById("input_02_message");
	var input_default = document.getElementById("input_02_default");
	var input_return = document.getElementById("input_02_return");

	// ------------------------------------------------------------
	// クリックした時に実行されるイベント
	// ------------------------------------------------------------
	input_button.onclick = function (){

		// 入力欄付きのダイアログボックスを表示する
//		var result = prompt(input_message.value,input_default.value);
//
//		input_return.value = result;
		
		var value=prompt("現在のパスワード");
//        document.write("お疲れ様です、"+value+"さん。");
		var value=prompt("新しいパスワード");
//        document.write("お疲れ様です、"+value+"さん。");
		var value=prompt("新しいパスワード確認欄");
//        document.write("お疲れ様です、"+value+"さん。");
	};

})();
//-->
</script>
	


	<!--ダイアログ-->
	<!--
<script>
        var value=prompt("お名前を入力してください。");
        document.write("お疲れ様です、"+value+"さん。");
    </script>
-->

</body>

</html>
