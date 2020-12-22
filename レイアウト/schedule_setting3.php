<!DOCTYPE html>
<!--予定管理画面3-->
<!--
参考：　https://webliker.info/75964/
-->

<!--
セルの大きさ揃える
ダイアログ作成
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
			border-collapse: collapse;
			border-spacing: 0;
/*			background-color: aliceblue;*/
		}

		table th,
		table td {
			padding: 10px 0;
			text-align: center;
		}

		.button_wrapper {
			text-align: center;
		}

		button {
			width: 80%;
			padding: 5px 10px;
			border: none;
			background-color: #ffdcdc;
		}
		
		.tbl{
			table-layout: fixed;
		}
		

		.checktbl th {
			width: 30%;
			text-align: right;
			padding: 0;
			margin: 0;
		}

		.checktbl td {
			text-align: left;
			padding: 0;
			margin: 0;
		}

	</style>
</head>



<body>
	<A href="schedule_setting1.php">←</A>
	<h1>予定名が入る</h1>
	<!--	表(tbl1)	日付用の表	-->
	<table align="center"　class="tbl">
		<thead>
		</thead>
		<tbody>
			<tr>
				<th colspan="4">開始日</th>
				<td colspan="4">12/15</td>
			</tr>
			<tr>
				<th colspan="4">終了日</th>
				<td colspan="4">12/16</td>
			</tr>
			<tr>
				<th colspan="4"> </th>
				<td colspan="4"> </td>
			</tr>
		</tbody>
	</table>

<!--	表(checktbl)	チェックボックスのみの表	-->
	<table align="center" class="checktbl">
		<thead>
		</thead>
		<tbody>
			<tr>
				<th><input type="checkbox" name="subject" value="無し" 　class="checkbox"></th>
				<td>無し</td>
			</tr>
			<tr>
				<th><input type="checkbox" name="subject" value="無し" 　class="checkbox"></th>
				<td>タスク名がここに入るよ🤪</td>
			</tr>
		</tbody>
	</table>

	<br>

<!--	決定ボタン	-->
	<div class="button_wrapper">
		<button onclick="location.href='./schedule_setting1.php'">決定</button>
	</div>








</body>

</html>
