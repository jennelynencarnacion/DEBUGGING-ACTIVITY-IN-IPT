<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tourism Website - Tours</title>
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
		<section id="tours">
    <h2>Tours</h2>
    <form method="GET">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Search">
    </form>
    <?php
        if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $xml = simplexml_load_file('index.xml');
    $found = false;
    foreach ($xml->blog as $blog) {
        if (stripos($blog->title, $search) !== false) {
            echo '<div class="blog">';
            echo '<h3>' . $blog->title . '</h3>';
            echo '<p>' . $blog->content . '</p>';
            echo '<p><strong>Author:</strong> ' . $blog->author . '</p>';
            echo '<p><strong>Date:</strong> ' . $blog->date . '</p>';
            echo '</div>';
            $found = true;
        }
    }
    if (!$found) {
        echo '<p>No blogs found.</p>';
    }
    // Display the search metadata
    echo '<p>Showing results for search: ' . $search . '</p>';
} else {
    $xml = simplexml_load_file('index.xml');
    foreach ($xml->blog as $blog) {
        echo '<div class="blog">';
        echo '<h3>' . $blog->title . '</h3>';
        echo '<p>' . $blog->content . '</p>';
        echo '<p><strong>Author:</strong> ' . $blog->author . '</p>';
        echo '<p><strong>Date:</strong> ' . $blog->date . '</p>';
        echo '</div>';
    }
}
    ?>
</section>
	</main>
	<footer>
		<p>&copy; 2023 Marinduque Tourism Website</p>
	</footer>
</body>
</html>








