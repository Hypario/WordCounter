<?php

class Counter
{

    /**
     * @var array
     */
    private $occurences = [];

    /**
     * Count the number of words in a text
     * @param string $text
     * @return int
     */
    public function wordCount(string $text): int
    {
        $words = array_filter(explode(" ", preg_replace("/[^\w'+]/", " ", $text)));
        foreach ($words as $word) {
            if (array_key_exists(strtolower($word), $this->occurences)) {
                $this->occurences[strtolower($word)] += 1;
            } else {
                $this->occurences[strtolower($word)] = 1;
            }
        }
        return count($words);
    }

    public function sentenceCount($text) {
        return count(preg_split("/\.(\\s|\n|$)/", $text, -1, PREG_SPLIT_NO_EMPTY));
    }

}
