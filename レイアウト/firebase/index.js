var txtmail = null;
var txtpass = null;

var searchemail = null;
var searchpass = null;
var searchusername = null;


var firebaseConfig = {
	apiKey: "AIzaSyDp12ZN5QLEeO437TaecR-aV1RPnedbxEY",
	authDomain: "s192054auth.firebaseapp.com",
	databaseURL: "https://s192054auth.firebaseio.com",
	projectId: "s192054auth",
	storageBucket: "s192054auth.appspot.com",
	messagingSenderId: "550035762728",
	appId: "1:550035762728:web:6635392359a62d5da6cf1d",
	measurementId: "G-SGPBWSMK6Y"
};

try {
	firebase.initializeApp(firebaseConfig);
} catch (error) {
	console.log(error);
}

var db = firebase.firestore();
let coll = db.collection("samples");

function onGet() {
	txtmail = document.querySelector('#textemail');
	txtpass = document.querySelector('#textpassword');
};


function doSet() {
	console.log("これから実行します");


	//	ドキュメントを取得する
	//	coll.doc(txtmail.value).get().then(function (doc) {
	//		if (doc.exists) {
	//			console.log("Document data: ", doc.data());
	//		} else {
	//			console.log("No such document!");
	//		}
	//	}).catch(function (error) {
	//		console.log("Error getting document: ", error);
	//	});


	//コレクションのすべてのドキュメントを取得する
	//				coll.get().then(function(querySnapshot) {
	//					querySnapshot.forEach(function(doc) {
	//						console.log(doc.id, " => ", doc.data());
	//						renderCafe(doc);
	//					});
	//				});


	//(where)コレクションから複数のドキュメントを取得する
	db.collection("samples")
		.where("mailaddress", "==", txtmail.value).where("password1", "==", txtpass.value)
		.get()
		.then(function (querySnapshot) {

			console.log("第1段階");

			querySnapshot.forEach(function (doc) {

				console.log("第2段階");

				// doc.data() is never undefined for query doc snapshots
				if (doc.exists) {

					console.log(doc.id, " => ", doc.data());
					let date = doc.data();
					searchemail = date.username;
					console.log("searchemail: " + searchemail);
					searchpass = date.password1;
					console.log("searchpass: " + searchpass);
					searchusername = date.username;
					console.log("searchusername: " + searchusername);
					
					//URL切り替え
					//windows.location.replace("https://www.....");

				} else {
					console.log("No such document!")
				}

			});
		})
		.catch(function (error) {
			console.log("Error getting documents: ", error);
		});



}
