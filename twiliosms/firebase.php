<html>
  <head>
    <script src="https://www.gstatic.com/firebasejs/5.7.3/firebase.js"></script>
    <script>
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

      firebase.auth().languageCode = 'it';
      // To apply the default browser preference instead of explicitly setting it.
      // firebase.auth().useDeviceLanguage();
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
        'size': 'invisible',
        'callback': function(response) {
          // reCAPTCHA solved, allow signInWithPhoneNumber.
          onSignInSubmit();
        }
      });
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'normal',
        'callback': function(response) {
          // reCAPTCHA solved, allow signInWithPhoneNumber.
          // ...
        },
        'expired-callback': function() {
          // Response expired. Ask user to solve reCAPTCHA again.
          // ...
        }
      });
      recaptchaVerifier.render().then(function(widgetId) {
        window.recaptchaWidgetId = widgetId;
      });
      var recaptchaResponse = grecaptcha.getResponse(window.recaptchaWidgetId);
      var phoneNumber = "+959424432880";
      var appVerifier = window.recaptchaVerifier;
      firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
          .then(function (confirmationResult) {
            // SMS sent. Prompt user to type the code from the message, then sign the
            // user in with confirmationResult.confirm(code).
            window.confirmationResult = confirmationResult;
          }).catch(function (error) {
            // Error; SMS not sent
            // ...
          });
    </script>
  </head>
  <body>
  </body>
</html>
