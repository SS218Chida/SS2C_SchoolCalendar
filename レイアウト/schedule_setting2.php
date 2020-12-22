<!DOCTYPE html>
<!--予定管理画面２-->
<!--
参考：　https://webliker.info/75964/
-->

<!--
追加ボタン押した後の画面遷移はこれでいいか

日時：文字数や数字以外が入力されたときはSQLとかJSとかで判断するしかないか…？
	↑そもそも文字数異常ごか数字以外の入力の対策をするか…？
-->

<html>

<head>
	<meta charset="UTF-8">
	<title>だいめい入力</title>

	<style>
		.p1 {
			float: left;
			width: 100px;
			margin: 15px 0px auto 5px;
			text-align: right;
		}

		h1 {
			text-align: center;
		}

		table {
			width: 80%;
			table-layout: fixed;
			border-collapse: collapse;
			border-spacing: 0;
		}

		table th,
		table td {
			padding: 10px 0;
			text-align: center;
		}
		
		.button_wrapper{
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			width: 80%;
		}
		
		button{
			width: 49%;
			padding: 5px 10px;
			margin: 0 0; 
			border: none;
		}
		
		.btn1{
			background-color: #ffdcdc;
		}
		
		.btn2{
			background-color: #dcffdc;
		}
		
		.left{
			text-align: right;
		}
		
		.right{
			text-align: left;
		}

	</style>
</head>



<body>
	<A href="schedule_setting1.php">←</A>
	<h1>予定名が入る</h1>
	<!--	表	-->
	<table align="center">
		<thead>
		</thead>
		<tbody>
			<tr>
				<th colspan="5">開始日</th>
				<td colspan="2" contenteditable=true class="left">12</td>
				<td>/</td>
				<td colspan="2" contenteditable=true class="right">15</td>
			</tr>
			<tr>
				<th colspan="5">開始時間</th>
				<td colspan="2" contenteditable=true class="left">9</td>
				<td>:</td>
				<td colspan="2" contenteditable=true class="right">55</td>
			</tr>
			<tr>
				<th colspan="4"> </th>
				<td colspan="4"> </td>
			</tr>
			<tr>
				<th colspan="5">終了日</th>
				<td colspan="2" contenteditable=true class="left">12</td>
				<td>/</td>
				<td colspan="2" contenteditable=true class="right">16</td>
			</tr>
			<tr>
				<th colspan="5">終了時間</th>
				<td colspan="2" contenteditable=true class="left">11</td>
				<td>:</td>
				<td colspan="2" contenteditable=true class="right">00</td>
			</tr>
		</tbody>
	</table>

	<br>

<div class="button_wrapper">
	<button onclick="location.href='./schedule_setting1.php'" class="btn1">削除</button>
	
	<button onclick="location.href='./calendar_home.php'" class="btn2">追加</button>
	</div>








</body>

</html>
