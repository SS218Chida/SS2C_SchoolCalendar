(function(){
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyAICRP4wN_Fyxl9GvbL-OLRSX9g9HcnJbc",
        authDomain: "s192218auth.firebaseapp.com",
        databaseURL: "https://s192218auth.firebaseio.com",
        projectId: "s192218auth",
        storageBucket: "s192218auth.appspot.com",
        messagingSenderId: "387146274399",
        appId: "1:387146274399:web:28c1b6316d32a978f56dea",
        measurementId: "G-VWM3X85T46"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
     
    const txtEmail = document.getElementById('txtEmail');
    const txtPassword = document.getElementById('txtPassword');
    const btnLogin = document.getElementById('btnLogin');
    const btnSignUp = document.getElementById('btnSignUp');
    const btnLogout = document.getElementById('btnLogout');

    btnLogin.addEventListener('click', e => {
        const email = txtEmail.value;
        const pass = txtPassword.value;
        const auth = firebase.auth();
        const promise = auth.signInWithEmailAndPassword(email,pass);
        promise.catch(e => console.log(e.message));
    });
    
    btnSignUp.addEventListener('click', e => {
        const email = txtEmail.value;
        const pass = txtPassword.value;
        const auth = firebase.auth();
        const promise = auth.createUserWithEmailAndPassword(email,pass);
        promise.catch(e => console.log(e.message));
    });
   
    btnLogout.addEventListener('click', e=>{
       firebase.auth().signOut(); 
    });
    
    firebase.auth().onAuthStateChanged(firbaseUser => {
        if(firbaseUser){
            console.log(firbaseUser);
            btnLogout.classList.remove('hide');
        }else{
            console.log('not logged in');
            btnLogout.classList.add('hide');
        };
    });
}());