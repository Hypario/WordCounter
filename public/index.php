<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Compteur GSI</title>
  <meta name="author" content="DONNE Dylan, DUTERTE Fabien, DASSONNEVILLE Virgile">

  <link rel="stylesheet" href="css/bootstrap-grid.min.css"/>
  <link rel="stylesheet" href="css/bootstrap-reboot.min.css"/>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>

</head>

<body class="d-inline-flex justify-content-center flex-column w-100">
	<div class="col-sm-12 col-md-8 col-lg-6">
		<form class="d-inline-flex justify-content-center flex-column w-100" name="compteur" method="post" action="index.php">
	        Entrez votre texte : <br/>
	        <textarea class="w-100" type="text" name="text" rows="20"><?php if (isset($_POST['text'])) { echo $_POST['text']; } ?></textarea><br/>
	        <input class="btn btn-success" type="submit" name="valider" value="Envoyer"/>
	    </form>
	</div>


	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-bundle.min.js"></script>

</body>

</html>

<?php 

$occurences = [];

function wordCount($text) {
	global $occurences;
	$words = array_filter(explode(" ", preg_replace("/[^\w'+]/", " ", $text)));
	foreach ($words as $word) {
		if (array_key_exists(strtolower($word), $occurences)) {
			$occurences[strtolower($word)] += 1;
		} else {
			$occurences[strtolower($word)] = 1;
		}
	}
	return count($words);
}

function sentenceCount($text) {
	return count(preg_split("/\.(\\s|\n|$)/", $text, -1, PREG_SPLIT_NO_EMPTY));
}


if(isset($_POST['text']) && !empty($_POST['text'])) {

	$mytext = $_POST['text'];
	echo "<p>Il y a " . wordCount($mytext) . " mots et " . sentenceCount($mytext) . " phrases.</p>";
	echo "<table class='table col-sm-12 col-md-8 col-lg-6'>";
	echo "<thead>";
	echo    "<tr>";
	echo      "<th scope='col'>Mot</th>";
	echo      "<th scope='col'>Occurences</th>";
	echo    "</tr>";
	echo  "</thead>";
	echo "<tbody>";
	foreach ($occurences as $mot => $occurences) {
		echo "<tr>";
	    echo  "<th scope='row'>" . $mot . "</th>";
	    echo  "<td>" . $occurences . "</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
}