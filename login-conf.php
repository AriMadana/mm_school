<?php
  include 'includes/init.php';

//check if the user clicked the submitt button named 'signin'
  if (isset($_POST['signin'])) {
    $login_email = $_POST['email'];
    $login_password = $_POST['password'];

    $user_id = $mm_user_class -> userMatch($login_email, $login_password);
    if($user_id != null) {
      $_SESSION['user_id'] = $user_id;
      $user_infos = $mm_user_class -> userInfoFromUserID($user_id);
      $_SESSION['school_id'] = $user_infos['user_school'];

      header('Location: index.php');
    } else {
      echo 'Login ERROR!';
    };
  }

  // include 'includes/init.php';
  // if (isset($_POST['signin'])) {
  //   $login_email = $_POST['email'];
  //   $login_password = $_POST['password'];
  //
  //   if ($mm_teacher_class -> user_exists($login_username) === false && $mm_student_class -> user_exists($login_username) === false) {
  //     $_SESSION['login_error'] = 'We can\'t find that username. Have you registered?';
  //     header('Location: index.php');
  //     //$errors[] = 'We can\'t find that username. Have you registered?';
  //   } else if ($mm_teacher_class -> user_active($login_username) == false && $mm_student_class -> user_active($login_username) == false) {
  //     $_SESSION['login_error'] = 'You haven\'t activated your account!';
  //     header('Location: index.php');
  //     //$errors[] = 'You haven\'t activated your account!';
  //   }
  //      if($mm_teacher_class -> user_exists($login_username) === true){
  //
  //       $login = $mm_teacher_class -> login_id($login_username, $login_password);
  //       if ($login == false) {
  //         $_SESSION['login_error'] = 'That username and password combination is incomplete!';
  //         header('Location: index.php');
  //         //$errors[] = 'That username and password combination is incorrect!';
  //       } else {
  //         $_SESSION['login_success'] = 'You <strong> logged</strong> in successfully';
  //         $_SESSION['teacher_id_custom'] = $login;
  //         header('Location: index.php');
  //
  //         exit();
  //       }
  //    }
  //
  //   else if($mm_student_class -> user_exists($login_username) === true){
  //
  //    $login = $mm_student_class -> login_id($login_username, $login_password);
  //    if ($login == false) {
  //      $_SESSION['login_error'] = 'That username and password combination is incorrect!';
  //      header('Location: index.php');
  //      //$errors[] = 'That username and password combination is incorrect!';
  //    } else {
  //      $_SESSION['login_success'] = 'You <strong> logged</strong> into successfully';
  //      $_SESSION['stu_id_custom'] = $login;
  //      header('Location: index.php');
  //
  //      exit();
  //    }
  //  }
  //   print_r($errors);
  //
  // } else {
  //     header('Location: index.php');
  // }
?>
