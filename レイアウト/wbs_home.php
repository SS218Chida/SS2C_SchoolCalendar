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
		<select class="type input1" name="type">
			<option value="クラス選択">クラス選択</option>
			<option value="講演・メディア出演のご依頼">講演・メディア出演のご依頼</option>
			<option value="その他お問い合わせ">その他お問い合わせ</option>
		</select>
		<!--科目選択-->
		<select class="type input1" name="type">
			<option value="科目選択">科目選択</option>
			<option value="講演・メディア出演のご依頼">講演・メディア出演のご依頼</option>
			<option value="その他お問い合わせ">その他お問い合わせ</option>
		</select>
	</div>
	
<!--	表	-->
	<table align="center"　class="table table-striped" id="target">
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
    <tbody id="params">
		
		<!--template-->
<!--	ここないと動かない	
	ここが＋ボタン押したときの複製もと
-->	
		<tr class="hide">
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td colspan="3"><input style="width: 100%;outline: 0;border: 0px;background: transparent;"></td>
        <td onclick="this.parentNode.outerHTML = ''"  class="sakujo"><i class="fas fa-ban"></i></td>
    </tr>
		
		<!--	ここ消すと＋ボタンがなくなる	-->
		
    <tr class="add_row"
        onclick="let node=this.previousElementSibling.cloneNode(true);node.removeAttribute('id');node.classList.remove('hide');this.parentNode.insertBefore(node,this)">
        <td colspan="8" style="text-align: center" class="plus"><i class="fas fa-plus"></i></td>
    </tr>
    </tbody>
	</table>
	



	<!--＋ボタン　追加するボタン-->
	<div class="button_wrapper2">
		<button type="submit" class="btn" onclick="location.href='./wbs_common.php'">追加する</button>
	</div>

</body>

</html>
