<html>
    <head>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="firstname">Voornaam:</label><br>
		<input type="text" id="firstname" name="firstname"><br>
		<label for="lastname">Achternaam:</label><br>
		<input type="text" id="lastname" name="lastname"><br>
		<label for="email">E-mail:</label><br>
		<input type="email" id="email" name="email"><br><br>
		<input type="submit" value="Verzenden">
	</form>
</body>
    </html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testingphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
