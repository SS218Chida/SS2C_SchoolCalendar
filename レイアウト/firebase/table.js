/*
 * appendRow: テーブルに行を追加
 */
function appendRow() {
	var objTBL = document.getElementById("tbl");
	if (!objTBL)
		return;

	var count = objTBL.rows.length;

	// 最終行に新しい行を追加
	var row = objTBL.insertRow(count);

	// 列の追加
	{
		var c1 = row.insertCell(0); //行
		var c2 = row.insertCell(1); //プロジェクト
		var c3 = row.insertCell(2); //タスク
		var c4 = row.insertCell(3); //開始日
		var c5 = row.insertCell(4); //終了日
		var c6 = row.insertCell(5); //終了時間
		var c7 = row.insertCell(6); //編集ボタン
		var c8 = row.insertCell(7); //削除ボタン
	}


	// 各列にスタイルを設定
	{
		c1.style.cssText = "text-align:right; width:40px;";
		c2.style.cssText = "text-align:right; width:40px;";
		c3.style.cssText = "text-align:right; width:40px;";
		c4.style.cssText = "text-align:right; width:40px;";
		c5.style.cssText = "text-align:right; width:40px;";
		c6.style.cssText = "text-align:right; width:40px;";
		c7.style.cssText = "background-color: green; width:40px;";
		c8.style.cssText = "background-color: red; width:40px;";
	}


	// 各列に表示内容を設定
	{
		c1.innerHTML = '<span class="seqno">' + count + '</span>';

		c2.innerHTML = '<input class="inpproj" type="text"   id="inpproj' + count + '" name="inpproj' + count + '" value="" size="30" style="border:1px solid #888;">';

		c3.innerHTML = '<input class="inptask" type="text"   id="tasktxt' + count + '" name="tasktxt' + count + '" value="" size="30" style="border:1px solid #888;">';

		c4.innerHTML = '<input class="startdate" type="text"   id="sdatetxt' + count + '" name="sdatetxt' + count + '" value="" size="30" style="border:1px solid #888;">';

		c5.innerHTML = '<input class="enddate" type="text"   id="edatetxt' + count + '" name="edatetxt' + count + '" value="" size="30" style="border:1px solid #888;">';

		c6.innerHTML = '<input class="endtime" type="text"  id="etimetxt' + count + '" name="etimetxt' + count + '" value="" size="30" style="border:1px solid #888;">';

		c7.innerHTML = '<input class="edtbtn" type="button" id="edtBtn' + count + '" value="確定" onclick="editRow(this)">';

		c8.innerHTML = '<input class="delbtn" type="button" id="delBtn' + count + '" value="削除" onclick="deleteRow(this)">';
	}

	// 追加した行の入力フィールドへフォーカスを設定
	var objInpA = document.getElementById("projtxt" + count);
	var objInpB = document.getElementById("tasktxt" + count);
	var objInpC = document.getElementById("sdatetxt" + count);
	var objInpD = document.getElementById("edatetxt" + count);
	var objInpE = document.getElementById("etimetxt" + count);

	if (objInpA) {
		objInpA.focus();
	} else if (objInpB) {
		objInpB.focus();
	} else if (objInpC) {
		objInpC.focus();
	} else if (objInpD) {
		objInpD.focus();
	} else if (objInpE) {
		objInpE.focus();
	}
}

/*
 * deleteRow: 削除ボタン該当行を削除
 */
function deleteRow(obj) {
	// 確認
	if (!confirm("この行を削除しますか？"))
		return;

	if (!obj)
		return;

	var objTR = obj.parentNode.parentNode;
	var objTBL = objTR.parentNode;

	if (objTBL)
		objTBL.deleteRow(objTR.sectionRowIndex);

	// <span> 行番号ふり直し
	var tagElements = document.getElementsByTagName("span");
	if (!tagElements)
		return false;

	var seq = 1;
	var proj = 1;
	var task = 1;
	var sdate = 1;
	var edate = 1;
	var etime = 1;
	for (var i = 0; i < tagElements.length; i++) {
		if (tagElements[i].className.match("seqno"))
			tagElements[i].innerHTML = seq++;
	}

	// id/name ふり直し
	var tagElements = document.getElementsByTagName("input");
	if (!tagElements)
		return false;

	// <input type="text" id="txtN">
	var seq = 1;

	for (var i = 0; i < tagElements.length; i++) {
		if (tagElements[i].className.match("inpproj")) {
			tagElements[i].setAttribute("id", "projtxt" + proj);
			tagElements[i].setAttribute("name", "projtxt" + proj);
			++proj;
		} else if (tagElements[i].className.match("inptask")) {
			tagElements[i].setAttribute("id", "tasktxt" + task);
			tagElements[i].setAttribute("name", "tasktxt" + task);
			++task;
		} else if (tagElements[i].className.match("startdate")) {
			tagElements[i].setAttribute("id", "sdatetxt" + sdate);
			tagElements[i].setAttribute("name", "sdatetxt" + sdate);
			++sdate;
		} else if (tagElements[i].className.match("enddate")) {
			tagElements[i].setAttribute("id", "edatetxt" + edate);
			tagElements[i].setAttribute("name", "edatetxt" + edate);
			++edate;
		} else if (tagElements[i].className.match("endtime")) {
			tagElements[i].setAttribute("id", "etimetxt" + etime);
			tagElements[i].setAttribute("name", "etimetxt" + etime);
			++etime;
		}
	}

	// <input type="button" id="edtBtnN">
	seq = 1;
	for (var i = 0; i < tagElements.length; i++) {
		if (tagElements[i].className.match("edtbtn")) {
			tagElements[i].setAttribute("id", "edtBtn" + seq);
			++seq;
		}
	}

	// <input type="button" id="delBtnN">
	seq = 1;
	for (var i = 0; i < tagElements.length; i++) {
		if (tagElements[i].className.match("delbtn")) {
			tagElements[i].setAttribute("id", "delBtn" + seq);
			++seq;
		}
	}
}

/*
 * editRow: 編集ボタン該当行の内容を入力・編集またモード切り替え
 */
function editRow(obj) {
	var objTR = obj.parentNode.parentNode;
	var rowId = objTR.sectionRowIndex;
	var objInp = document.getElementById("projtxt"||"tasktxt"||"sdatetxt"||"edatetxt"||etimetxt + rowId);
	var objBtn = document.getElementById("edtBtn" + rowId);

	if (!objInp || !objBtn)
		return;

	// モードの切り替えはボタンの値で判定   
	if (objBtn.value == "編集") {
		objInp.style.cssText = "border:1px solid #888;"
		objInp.readOnly = false;
		objInp.focus();
		objBtn.value = "確定";
	} else {
		objInp.style.cssText = "border:none;"
		objInp.readOnly = true;
		objBtn.value = "編集";
	}
}
