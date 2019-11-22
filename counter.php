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
        Entrez votre texte : <input type="text" name="text"/><br/>
        <input type="submit" name="valider" value="Envoyer"/>
    </form>

</body>

</html>

<?php 

//$mytext = "Finalement il revint sur les lèvres la flèche acérée et légère qui vole droit au but. Demande-leur s'ils l'emportent, et qui furent très partagés, comme le paysage qui les enchante, parce que la princesse vous expliquera elle-même. Bouffon, tu vas encore attraper froid, et on vexait son orgueil en sera consolé, mais son ombre même.";

$occurences = [];

function wordCount($text) {
	global $occurences;
	$words = explode(" ", $text);
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