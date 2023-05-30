<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="referrer" content="origin-when-crossorigin" id="meta_referrer">
	<title>Tourism Website</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Tourism Website</h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="tours.php">Tours</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section id="home">
			<h2>Welcome to Tourism Website</h2>
			<p>Here you can find the best travel destinations around the world.</p>
		</section>
		<section id="tours">
			<h2>Popular Tours</h2>
			<!-- Insert code here to display popular tours from your XML file -->
				<?php
	$xml = simplexml_load_file('index.xml');
	foreach ($xml->tour as $tour) {
		echo '<div class="tour">';
		echo '<h3>' . $tour->destination . '</h3>';
		echo '<p>' . $tour->description . '</p>';
		echo '<p><strong>Price:</strong> ' . $tour->price . '</p>';
		echo '</div>';
	}
	?>

		</section>
		<section id="about">
			<h2>About Us</h2>
			<p>We are a team of travel enthusiasts who want to share our love for travel with the world.</p>
		</section>
		<section id="contact">
	<h2>Contact Us</h2>
	<form method="POST" action="submit_contact.php" onsubmit="return validateForm()">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>
		<label for="message">Message:</label>
		<textarea id="message" name="message" required></textarea>
		<input type="submit" value="Send">
	</form>
</section>

<script>
function validateForm() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;

  if (name == "") {
    alert("Name must be filled out");
    return false;
  }

  if (email == "") {
    alert("Email must be filled out");
    return false;
  }

  if (message == "") {
    alert("Message must be filled out");
    return false;
  }

  // You can add additional validation checks for the email format and message length, etc.

  return true;
}
</script>

	</main>
	<footer>
		<p>&copy; 2023 Marinduque Tourism Website</p>
	</footer>
</body>
</html>
