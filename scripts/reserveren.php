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
  $naam = $_POST['name'];
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


<!-- Database -->
  
  <?php
// Create database connection
$conn = mysqli_connect("localhost", "username", "password", "databasename");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert data into database
$sql = "INSERT INTO users (name, email, persons, date)
VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["persons"]."', '".$_POST["date"]."')";

if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}

// Send email
$to = $_POST['email'];
$subject = 'Reservation Confirmation';
$message = 'Thank you for your reservation!';
$headers = 'From: restaurantdepink.nl' . "\r\n" .
    'Reply-To: restaurantdepink.nl' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

// Close connection
mysqli_close($conn);
?>

</body>

</html>
