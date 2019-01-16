
  // include './vendor/autoload.php';
  // if(isset($_POST['mobile']) && isset($_POST['msg'])) {
  //   $sid = 'AC51d4412ab9e465ef8e98a6179b259bb8';
  //   $token = 'c1b007a37d66dbeeea6f4a5f6bfb43d0';
  //
  //   $client = new Twilio\Rest\Client($sid, $token);
  //   $message = $client->message->create(
  //     $_POST['mobile'],array(
  //       'from'=> '+959424432880',
  //       'body'=> $_POST['msg']
  //     )
  //   );
  //
  //   if($message->sid) {
  //     echo "Message sent!";
  //   }
  // }

  <?php

  // Update the path below to your autoload.php,
  // see https://getcomposer.org/doc/01-basic-usage.md
  require_once './vendor/autoload.php';

  use Twilio\Rest\Client;

  // Find your Account Sid and Auth Token at twilio.com/console
  $sid    = "AC51d4412ab9e465ef8e98a6179b259bb8";
  $token  = "c1b007a37d66dbeeea6f4a5f6bfb43d0";
  $twilio = new Client($sid, $token);

  $message = $twilio->messages
                    ->create("+959424432880", // to
                             array("from" => "+16824631528", "body" => "Htet Kyi Fin Ngar Cha by KyarSi")
                    );

  print($message->sid);

  ?>
<h2>Sending SMS using Twilio API</h2>
<form action="" method="POST">
  Enter Mobile:<br>
  <input type="text" placeholder="mobile number" name="mobile"><br>
  Message:<br>
  <textarea placeholder="message" name="msg"></textarea><br>
  <input type="submit" value="Send">
</form>
