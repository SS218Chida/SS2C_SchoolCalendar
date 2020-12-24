<!--http://localhost/schoolCurry-->
<!--
phpでhtmlを書く： https://techacademy.jp/magazine/19156
-->
<!DOCTYPE html>
<!--
レイアウト：https://qiita.com/chousensha01/items/ed29dd22a022aed058d9

要素の表示非表示
https://itsakura.com/javascript-display

divをスクロールしても動かないようにする(.passChange)
https://proengineer.internous.co.jp/content/columnfeature/12366
-->

<!--

settingが動作する方
こっちはダイアログ試すようのベース

確定ボタン押したらカレンダー画面に遷移するようにした。でも、元々話し合ってたのでは画面遷移ないボタンだから画面遷移なくしてもいいよ😎

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

		.input1 {
			width: 50%;
		}

		.checkbox {
			width: 20px;
		}

		.button_wrapper1 {
			text-align: right;
			clear: both;
		}

		.button_wrapper2 {
			text-align: left;
			clear: both;
		}

		.btn {
			width: 100px;
		}

		.btn1 {
			width: 170px;
		}

		.radio2 {
			float: left;
		}
		
		.passChange{
			background-color: azure;
/*			background-color: rgba(1,1,1,1);*/
			width: 80%;
			position: fixed;
			top: 30%;
			left: 10%;
		}
		
		.contact1{
			border: solid;
			background-color: whitesmoke;
		}
		
		.button_wrapper{
			text-align: center;
		}

	</style>
	
</head>



<body>
	
	<div id="p1" class="passChange">
		<form class="contact1" method="post">

			<dl>
				<!--それぞれ入力してもらうとこ-->
				<dt>パスワード</dt>
				<dd><input type="password" name="pass" class="pass input1"></dd>
				<dt>新しいパスワード</dt>
				<dd><input type="password" name="pass" class="pass input1"></dd>
				<dt>新しいパスワード確認</dt>
				<dd><input type="password" name="pass" class="pass input1"></dd>

			</dl>

			<!--	作成、キャンセルボタン		-->
			<div class="button_wrapper">
				<button type="submit" class="btn" onclick="clickBtn1()">作成</button>
				<button type="submit" class="btn" onclick="clickBtn1()">キャンセル</button>
			</div>
		</form>
	</div>

<script>
//初期表示は非表示
document.getElementById("p1").style.display ="none";

function clickBtn1(){
	const p1 = document.getElementById("p1");

	if(p1.style.display=="block"){
		// noneで非表示
		p1.style.display ="none";
	}else{
		// blockで表示
		p1.style.display ="block";
	}
}
</script>
	
	<A href="calendar_home.php">←</A>
	<h1>ユーザネームかユーザID</h1>
	<div class="form-wrapper">
<!--		<form class="contact" action="index.html" method="post">-->
		<form class="contact" method="post">

			<dl>
				<div>
					<dt1><button type="button" class="btn1" onclick="location.href='./subjectClass_setting.php'">クラス・科目を追加する</button></dt1>
					<dd><br></dd>
				</div>

				<div>
					<dt1><input type="button" class="btn1" value="パスワードを変更" onclick="clickBtn1()"></dt1>
					<dd><br></dd>
				</div>

				<div>
					<!--クラスを選択するとこ-->
					<dt>クラス選択</dt>
				</div>
				<div>
					<dd>
						<!--プルダウンの値入力するとこ-->
						<select class="type input1" name="type">
							<option value="撮影のご依頼">撮影のご依頼</option>
							<option value="講演・メディア出演のご依頼">講演・メディア出演のご依頼</option>
							<option value="その他お問い合わせ">その他お問い合わせ</option>
						</select>
					</dd>
				</div>
				<div>
					<!--科目を選択するとこ-->
				<dt>科目選択</dt>
				<dd>
					<table align="left" class="checktbl">
						<thead>
						</thead>
						<tbody>
							<tr>
								<th><input type="checkbox" name="subject" value="無し" 　class="checkbox" checked></th>
								<td>無し</td>
							</tr>
							<tr>
								<th><input type="checkbox" name="subject" value="科目名1" 　class="checkbox"></th>
								<td>科目名1</td>
							</tr>
						</tbody>
					</table>
				</dd>
				</div>
				
				<div>

					<!--先生or生徒　選択するとこ-->
					<dt>あなたはどちらですか？</dt>
					<dd class="radio2">
						<input type="radio" name="contact" value="生徒" checked="" class="radio">生徒
						<input type="radio" name="contact" value="先生" class="radio">先生
					</dd>
				</div>
			</dl>
			
			<div class="button_wrapper1">
<!--		type=submit だと画面遷移しなかったけど、SQLとかしだいでは変えてもいいよ😎		-->
				<button type="button" class="btn" onclick="location.href='./calendar_home.php'">確定</button></div>
			<div class="button_wrapper2">
				<button type="button" class="btn" onclick="location.href='./index.html'">ログアウト</button>
			</div>
		</form>
	</div>

	
	


	<!--ダイアログ-->
	<!--
<script>
        var value=prompt("お名前を入力してください。");
        document.write("お疲れ様です、"+value+"さん。");
    </script>
-->

</body>

</html>
