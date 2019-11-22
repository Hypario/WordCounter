<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Compteur GSI</title>
  <meta name="author" content="DONNE Dylan, DUTERTE Fabien, DASSONNEVILLE Virgile">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

	<form name="compteur" method="post" action="counter.php">
        Entrez votre texte : <br/>
        <textarea type="text" name="text" rows="20" cols="100"><?php if (isset($_POST['text'])) { echo $_POST['text']; } ?></textarea><br/>
        <input type="submit" name="valider" value="Envoyer"/>
    </form>

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
	foreach ($occurences as $mot => $occurences) {
		echo "<p>Le mot $mot apparaît $occurences fois</p>";
	}
}