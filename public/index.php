<?php

use IUTLens\Counter;

define('ROOT', dirname(__DIR__));

require ROOT . '/vendor/autoload.php';

if (isset($_POST['text']) && !empty($_POST['text'])) {
    $text = $_POST['text'];
    $counter = new Counter();
    $nbWords = $counter->wordCount($text);
    $nbSentences = $counter->sentenceCount($text);
    $occurrences = $counter->getOccurrences($text);
}

$time_end = microtime(true);

require ROOT . '/views/index.php';
