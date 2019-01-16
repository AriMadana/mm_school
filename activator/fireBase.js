var app_firebase = {};
(function() {
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyDyThyX1naJ7SbwxN-J0TB4nl5K0t9dkkc",
      authDomain: "mm-school-cf29d.firebaseapp.com",
      databaseURL: "https://mm-school-cf29d.firebaseio.com",
      projectId: "mm-school-cf29d",
      storageBucket: "mm-school-cf29d.appspot.com",
      messagingSenderId: "845939983248"
    };
    firebase.initializeApp(config);

    app_firebase = firebase;
})()
