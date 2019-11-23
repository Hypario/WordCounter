<?php

use IUTLens\Counter;

define('ROOT', dirname(__DIR__));

require ROOT . '/vendor/autoload.php';

if(!empty($_POST)) {
    // filter the parameters
    $params = array_filter($_POST, function ($key) {
        return in_array($key, ['text']);
    }, ARRAY_FILTER_USE_KEY);

    $validator = new \IUTLens\Validator($params);
    $validator->notEmpty('text');

    if ($validator->isValid()) {
        $counter = new Counter();
        $nbWords = $counter->wordCount($params['text']);
        $nbSentences = $counter->sentenceCount($params['text']);
        $occurrences = $counter->getOccurrences($params['text']);
    }
}
require ROOT . '/views/index.php';
