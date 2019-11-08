<?php 

$mytext = "Finalement il revint sur les lèvres la flèche acérée et légère qui vole droit au but. Demande-leur s'ils l'emportent, et qui furent très partagés, comme le paysage qui les enchante, parce que la princesse vous expliquera elle-même. Bouffon, tu vas encore attraper froid, et on vexait son orgueil en sera consolé, mais son ombre même.";

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


echo "Il y a " . wordCount($mytext) . " mots" . PHP_EOL;
echo "et " . sentenceCount($mytext) . " phrases." . PHP_EOL;
foreach ($occurences as $mot => $occurences) {
	echo "Le mot $mot apparaît $occurences fois" . PHP_EOL;
}