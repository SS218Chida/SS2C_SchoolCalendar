<!DOCTYPE html>
<!--予定管理画面１-->
<!--
参考：　https://webliker.info/75964/
-->
<!--
画面遷移：完成(←、各予定、＋ボタン　どれも画面遷移する)
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
		}

		table th,
		table td {
			padding: 10px 0;
			/*			text-align: center;*/
		}

		/*	奇数行	*/
		.table tr:nth-child(odd) {
			background-color: #ccc;
		}

		/*	偶数行	*/
		.table tr:nth-child(even) {
			background-color: #eee;
		}

		.start {
			text-align: right;
		}

		.mid {
			text-align: center;
		}

		.end {
			text-align: left;
		}

		/*	奇数行	*/
		.table2 tr:nth-child(odd) {
			background-color: #fdaaaa;
		}

		/*	偶数行	*/
		.table2 tr:nth-child(even) {
			background-color: #ffdcdc;
		}

		.button_wrapper {
			text-align: right;
			margin: 20px 20px;
			padding: 20px 20px;
		}

	</style>
</head>



<body>
	<A href="calendar_home.php">←</A>
	<h1>日付が入る</h1>
	<!--	表	-->
	<table align="center" class="table table-striped">
		<thead>
		</thead>
		<tbody>
			<!--	最初に作ってた表の行	-->
			<tr onclick="location.href='./schedule_setting2.php'">
				<th colspan="4">プライベート</th>
				<td class="start">12/15</td>
				<td class="mid">~</td>
				<td class="end">12/16</td>
			</tr>
			<tr onclick="location.href='./schedule_setting2.php'">
				<th colspan="4">😏ここに予定の名前が入るよ🤪</th>
				<td class="start">12/15</td>
				<td class="mid">~</td>
				<td class="end">12/16</td>
			</tr>
			<tr onclick="location.href='./schedule_setting2.php'">
				<th colspan="4">予定名</th>
				<td class="start">12/15</td>
				<td class="mid">~</td>
				<td class="end">12/16</td>
			</tr>
		</tbody>
	</table>


	<br>


	<table align="center" class="table2">
		<thead>
		</thead>
		<tbody>
			<!--	最初に作ってた表の行	-->
			<tr onclick="location.href='./schedule_setting3.php'">
				<th colspan="4">WBS</th>
				<td class="start">12/15</td>
				<td class="mid">~</td>
				<td class="end">12/16</td>
			</tr>
			<tr>
				<th colspan="4"onclick="location.href='./schedule_setting3.php'">😏ここにWBSの予定の名前が入るよ🤪</th>
				<td class="start">12/15</td>
				<td class="mid">~</td>
				<td class="end">12/16</td>
			</tr>
		</tbody>
	</table>

	<!--＋ボタン	押したら予定管理画面２へ遷移する-->
	<div class="button_wrapper"><button onclick="location.href='./schedule_setting2.php'" class="btn1">＋</button></div>



</body>

</html>
