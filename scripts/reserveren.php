<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uw reserving bekijken</title>
  <!-- Importeren van de Google font -->
  <link rel="icon" type="image/png" href="img/thuisbezorgd2.png" />
  <link href='https://fonts.googleapis.com/css?family=Luckiest Guy' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/80bfb3b6e2.js" crossorigin="anonymous"></script>
</head>

<body>
  <style>
    * {
      background-color: pink;
      color: white;
      font-family: 'Jura';
    }

    #btnPrint {
      background-color: white;
      color: #FF597B;
      border: none;
      padding: 15px 32px;
      text-decoration: none;
      font-size: 15px;
      border-radius: 12px;
    }
    /* Print */
    @media print {
   .noPrint {
     display:none;
   }
}
  </style>

  <h1>  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get value
  $naam = $_POST['naam'];
  if (empty($naam)) {
    echo "Name is empty";
  } else {
    echo ucfirst($naam);
  }
}
?>
, u heeft succesvol geboekt!</h1>

  <p>Er word binnen enkele uren een mail gestuurd naar <span style="text-decoration: underline"><?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Haalt waarde op
  $email = $_POST['email'];
  if (empty($email)) {
    echo "Email is empty";
  } else {
    echo $email;
  }
}
?> </span>met de bevestiging van uw boeking.</p>

    <button class="noPrint" id="btnPrint" onclick="window.print()">Print deze pagina uit</button>

  <br>

  <?php 
if(isset($_POST['submit'])){
    $to = "aidenonyenwenu@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['naam'];
    $last_name = $_POST['naam'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>

</body>

</html>