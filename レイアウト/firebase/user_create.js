var nm = null;
var ml = null;
var ps1 = null;
var ps2 = null;
var msg = null;

var firebaseConfig = {
    apiKey: "AIzaSyDp12ZN5QLEeO437TaecR-aV1RPnedbxEY",
    authDomain: "s192054auth.firebaseapp.com",
    databaseURL: "https://s192054auth.firebaseio.com",
    projectId: "s192054auth",
    storageBucket: "s192054auth.appspot.com",
   	messagingSenderId: "550035762728",
   	appId: "1:550035762728:web:9353c2e9fa9b792fa6cf1d",
   	measurementId: "G-J0T9R4JFST"	
}

try {
    firebase.initializeApp(firebaseConfig);
}
catch (e) {
    console.log(e);
}

var db = firebase.firestore();
let coll = db.collection("samples");

function onGet() {
    nm = document.querySelector('#name');
    ml = document.querySelector('#mail');
    ps1 = document.querySelector('#pass1');
    ps2 = document.querySelector('#pass2');
    msg = document.querySelector('#msg');

}

coll.onSnapshot((querySnapshot) => {
    let result = '';
    querySnapshot.forEach((doc) => {
        let date = doc.data();
        result += '<li>' + date.username + '[' + date.mailaddress + ':' + date.password1 + ':' + date.password2 + ']</li>';
    });
    document.querySelector('#list').innerHTML = result;
});

function doSet() {

	if(ps1.value===ps2.value){
    coll.doc(ml.value).set({
        username: nm.value,
        mailaddress: ml.value,
        password1: ps1.value
    })
        .then(function () {
            console.log(ml + "に保存成功");
		console.log("username: " + nm.value);
		console.log("emailaddress: " + ml.value);
		console.log("password: " + ps1.value);
		alert('ユーザ作成できました');
		location.replace("index.html");
        })
        .catch(function (error) {
            console.error(error);
        });
	}else{
		console.log("パスワードが一致してない");
	}
    
}