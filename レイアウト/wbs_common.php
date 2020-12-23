wbs一覧画面
<!DOCTYPE html>
<!--wbs一覧画面-->
<!--
参考：　https://webliker.info/75964/
-->
<!--
画面遷移：完成(←、各予定、＋ボタン　どれも画面遷移する)
削除ボタン押したらダイアログとかほしいかも
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
			text-align: center;
		}

		/*	奇数行	*/
		.table tr:nth-child(odd) {
			background-color: #ccc;
		}

		/*	偶数行	*/
		.table tr:nth-child(even) {
			background-color: #eee;
		}

		td:hover {
			background-color: white;
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

		.btn {
			border: none;

			background-color:rgba {
				255,
				255,
				255,
				0
			}

			;
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
			<tr>
				<th colspan="4">WBSの名前</th>
				<td onclick="location.href='./wbs_home.php'">編集</td>
				<td>削除</td>
				<td>共有</td>
			</tr>
			<tr>
				<th colspan="4">😏WBSの名前🤪</th>
				<td onclick="location.href='./wbs_home.php'">編集</td>
				<td>削除</td>
				<td>共有</td>
			</tr>
			<tr>
				<th colspan="4">😏WBSの名前🤪</th>
				<td onclick="location.href='./wbs_home.php'">編集</td>
				<td>削除</td>
				<td>共有</td>
			</tr>
		</tbody>
	</table>



	<!--＋ボタン	押したら予定管理画面２へ遷移する-->
	<div class="button_wrapper"><button onclick="location.href='./wbs_home.php'">WBSを作成</button></div>



</body>

</html>
