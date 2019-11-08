<?php 

$mytext = "It's my amazing text";

function wordCount($text) {
	return count(explode(" ", $text));
}

echo wordCount($mytext) . "\n";