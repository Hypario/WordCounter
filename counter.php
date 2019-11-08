<?php 

$mytext = "Finalement il revint sur les lèvres la flèche acérée et légère qui vole droit au but. Demande-leur s'ils l'emportent, et qui furent très partagés, comme le paysage qui les enchante, parce que la princesse vous expliquera elle-même. Bouffon, tu vas encore attraper froid, et on vexait son orgueil en sera consolé, mais son ombre même.";

function wordCount($text) {
	return count(explode(" ", $text));
}

function sentenceCount($text) {
	return count(preg_split("/\.(\\s|\n|$)/", $text, -1, PREG_SPLIT_NO_EMPTY));
}


echo wordCount($mytext) . "\n";
echo sentenceCount($mytext) . "\n";