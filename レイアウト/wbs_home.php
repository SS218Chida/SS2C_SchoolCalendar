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
<!--WBS作成画面-->

<!--white-space:nowrap;			/*セル内の改行を禁止する*/-->

<html>

<head>
	<meta charset="UTF-8">
	<title>だいめい入力</title>
	
	<!--		消すと＋ボタンなくなる	-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
	
	
	<style>
		.p1 {
			float: left;
			width: 100px;
			margin: 15px 0px auto 5px;
			text-align: right;
		}

		.in1 {
/*		margin:	上　右　下　左 ; */
			margin: 15px 0px auto 5px;
			float: left;
			height: 17px;
			width: 40%;
		}
		
		.input1{
			margin: 15px 0px auto 0px;
			float: left;
			height: 23px;
			width: 20%;
		}

		.daimei {
			display: inline-block;
			width: 100%;
			clear: none;
		}

		table{
			border-collapse: collapse;
			table-layout: fixed;
			width: 90%;
			margin: 10px auto auto auto;
		}
		
		th,td{
			border: solid;
		}

		.button_wrapper2 {
			text-align: right;
			padding: 5%;
		}

		.btn {
			margin: 5px auto;
		}
		
		.sakujo{
			border: none;
			text-align: center;
		}
		
		.plus{
			border: none;
			background-color: gainsboro;
		}
		
	</style>
</head>



<body>
	<A href="wbs_common.php">←</A>
	<div class="daimei">
		<p class="p1">WBSの名前</p>
		<input type="text" name="WBSname" class="in1">
		<!--クラス選択-->
		<select class="type input1" name="class">
			<option value="クラス選択">クラス選択</option>
			<?php foreach ($sql as $value) { ?>
				<option value="<?php echo htmlspecialchars($value["class"], ENT_QUOTES, "UTF-8"); ?>">
					<?php echo htmlspecialchars($value["class"], ENT_QUOTES, "UTF-8"); ?>
				</option>
			<?php } ?>
		</select>
		<!--科目選択-->
		<select class="type input1" name="subject">
			<option value="科目選択">科目選択</option>
			<?php foreach ($sql1 as $value) { ?>
				<option value="<?php echo htmlspecialchars($value["subject"], ENT_QUOTES, "UTF-8"); ?>">
					<?php echo htmlspecialchars($value["subject"], ENT_QUOTES, "UTF-8"); ?>
				</option>
			<?php } ?>
		</select>
	</div>
	
<!--	表	-->
	<!-- <table align="center"　class="table table-striped" id="target">
		<thead>
		<tr>
			<th rowspan="2">作業名</th>
			<th rowspan="2">タスク</th>
			<th colspan="3">期限</th>
			<th rowspan="2" colspan="3">補足</th>
			<th rowspan="2"　 class="sakujo">削除</th>
		</tr>
		<tr>
			<th>開始日</th>
			<th>終了日</th>
			<th>終了時間</th>
		</tr>
			</thead>
    <tbody id="params"> -->
		
		<!--template-->
<!--	ここないと動かない	
	ここが＋ボタン押したときの複製もと
-->	
		<!-- <tr class="hide">
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td colspan="3"><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td onclick="this.parentNode.outerHTML = ''"  class="sakujo"><i class="fas fa-ban"></i></td>
    </tr> -->
		
		<!--	ここ消すと＋ボタンがなくなる	-->
		
    <!-- <tr class="add_row"
        onclick="let node=this.previousElementSibling.cloneNode(true);node.removeAttribute('id');node.classList.remove('hide');this.parentNode.insertBefore(node,this)">
        <td colspan="8" style="text-align: center" class="plus"><i class="fas fa-plus"></i></td>
    </tr>
    </tbody>
	</table> -->
	
	<form id="frm" name="frm" method="GET" action="">
		<div>新しい行を追加：<input type="button" id="add" name="add" value="追加" onclick="appendRow()"></div>
		<table align="center"　class="table table-striped" id="tbl">
			<!-- <tr>
				<th style="text-align:right; width:40px;">行</th>
				<th style="">プロジェクト</th>
				<th style="">タスク</th>
				<th style="">開始日</th>
				<th style="">終了日</th>
				<th style="">終了時間</th>
				<th style="background-color: green; width:40px;">補足</th>
				<th style="background-color: red; width:40px;">補足</th>
			</tr> -->
			<tr>
				<th rowspan="2">作業名</th>
				<th rowspan="2">タスク</th>
				<th colspan="3">期限</th>
				<th rowspan="2" colspan="3">補足</th>
				<th rowspan="2"　 class="sakujo">削除</th>
			</tr>
			<tr>
				<th>開始日</th>
				<th>終了日</th>
				<th>終了時間</th>
			</tr>
			<!-- <tr>
				
				<td style="text-align:right; width:40px;"><span class="seqno">1</span></td>
				
				<td style=""><input class="inpproj" type="text" id="projtxt1" name="projtxt1" value="プロジェクトを追加してみよう" size="30" readonly style="border:none"></td>
				
				<td style=""><input class="inptask" type="text" id="tasktxt1" name="tasktxt1" value="タスクを追加してみよう" size="30" readonly style="border:none"></td>
				
				<td style=""><input class="startdate" type="text" id="sdatetxt1" name="sdatetxt1" value="開始日" size="30" readonly style="border:none"></td>
				
				<td style=""><input class="enddate" type="text" id="edatetxt1" name="edatetxt1" value="終了日" size="30" readonly style="border:none"></td>
				
				<td style=""><input class="endtime" type="text" id="etimetxt1" name="etimetxt1" value="終了時間" size="30" readonly style="border:none"></td>
				
				<td style="background-color: green; width:40px;"><input class="edtbtn" type="button" id="edtBtn1" value="編集" onclick="editRow(this)"></td>
				
				<td style="background-color: red; width:40px;"><input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)"></td>
				
			</tr> -->
			<!-- <tr>
				
				<td rowspan="2"><input class="inpproj" type="text" id="projtxt1" name="projtxt1" value="作業名を追加" size="20" readonly style="border:none"></td>
				
				<td rowspan="2"><input class="inptask" type="text" id="tasktxt1" name="tasktxt1" value="タスクを追加" size="20" readonly style="border:none"></td>
				
				<td style=""><input class="startdate" type="text" id="sdatetxt1" name="sdatetxt1" value="開始日" size="30" readonly style="border:none"></td>
				
				<td style=""><input class="enddate" type="text" id="edatetxt1" name="edatetxt1" value="終了日" size="30" readonly style="border:none"></td>
				
				<td style=""><input class="endtime" type="text" id="etimetxt1" name="etimetxt1" value="終了時間" size="30" readonly style="border:none"></td>
				
				<td style="background-color: green; width:40px;"><input class="edtbtn" type="button" id="edtBtn1" value="編集" onclick="editRow(this)"></td>
				
				<td style="background-color: red; width:40px;"><input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)"></td>
				
			</tr> -->
		</table>
		<input type="submit" value="送信">
	</form>

	<script src="./table.js"></script>

	<!--＋ボタン　追加するボタン-->
	<!-- <div class="button_wrapper2">
		<button type="submit" class="btn" onclick="location.href='./wbs_common.php'">追加する</button>
	</div> -->

</body>

</html>
