<?php

use IUTLens\Counter;
use IUTLens\Validator;

define('ROOT', dirname(__DIR__));

require ROOT . '/vendor/autoload.php';

if (!empty($_POST) || !empty($_FILES)) {

    // filter the parameters
    $params = array_filter(array_merge($_POST, $_FILES), function ($key) {
        return in_array($key, ['text', 'file']);
    }, ARRAY_FILTER_USE_KEY);

    $text = $params['text'];

    // validate uploaded file
    if (array_key_exists('file', $params)) {
        $validator = new Validator($params);
        $validator->isTxt('file');

        if ($validator->isValid()) {
            // read content
            $text .= file_get_contents($params['file']['tmp_name']);
        }
    }

    // count
    $counter = new Counter();
    $nbWords = $counter->wordCount($text);
    $nbSentences = $counter->sentenceCount($text);
    $occurrences = $counter->getOccurrences($text);
}
require ROOT . '/views/index.php';
