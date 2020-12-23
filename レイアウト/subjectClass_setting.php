<!DOCTYPE html>
<!--科目等設定画面-->
<!--
レイアウト：https://qiita.com/chousensha01/items/ed29dd22a022aed058d9
ハイパーテキスト： https://mahlog.typepad.jp/html/18_a.html
-->

<html>

<head>
	<meta charset="UTF-8">
	<title>だいめい入力</title>
	<style>
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
			padding: 0 0;
			float: left;
			clear: both;
		}

		form dl dd {
			padding: 0 0;
		}

		.input {
			width: 50%;
			margin: 0px;
		}

		.button_wrapper {
			text-align: center;
		}

		.button_wrapper2 {
			text-align: right;
		}

		.btn {
			width: 100px;
		}

	</style>
</head>



<body>
	<A href="user_setting.php">←</A>
	<div class="form-wrapper">
			<dl>
				<!--クラス追加-->
				<div class="innn">
					<dt>クラス追加</dt>
					<dd><input type="text" name="class" id="class1" class="name input"></dd>
				</div>
				<div class="innn">
					<dt>　</dt>
					<dd><input type="text" name="clsss" id="class2" class="name input"></dd>
				</div>
				<div class="innn">
					<dt>　</dt>
					<!--クラス追加の＋ボタン-->
					<dt1>
						<div class="button_wrapper2"><input type="button" id="button_02" class="btn1" value="＋"></div>
					</dt1>
					<dd><br></dd>
				</div>

				<!--科目追加-->
				<div class="innn">
					<dt>科目追加</dt>
					<dd><input type="text" name="sub" class="subject input"></dd>
				</div>
				<div class="innn">
					<dt>　</dt>
					<dd><input type="text" name="sub" class="subject input"></dd>
				</div>
				<div class="innn">
					<dt>　</dt>
					<!--科目追加の＋ボタン-->
					<dt1>
						<div class="button_wrapper2"><input type="button" id="button_02" class="btn1" value="＋"></div>
					</dt1>
					<dd><br></dd>
				</div>
			</dl>
			<!--キャンセルボタンと追加するボタン-->
			<div class="button_wrapper">
				<button type="submit" id="btn2" class="btn">キャンセル</button>
				<button type="submit" name="btn1" id="btn1" class="btn">追加する</button>
			</div>
	</div>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js">
    </script>
    <script>
        const btn1 = document.getElementById("btn1");
        btn1.addEventListener('click', function() {
                    // ここに#buttonをクリックしたら発生させる処理を記述する
                    var class_name1 = document.getElementById("class1").value;
                    var class_name2 = document.getElementById("class2").value;
                    var param = {
                        "class1": class_name1,
                        "class2": class_name2
                    }
                    $.post({
                        url: 'insert.php', //送り先
                        data: param,
                        success: function(data) {
                            alert('変更が完了しました');
                            console.log(data);
                        },
                        error: function(data) {
                            alert('変更に失敗しました');
                            console.log(data);
                        }
                    });
                });
                              

    </script>

</body>

</html>
