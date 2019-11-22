<?php

namespace IUTLens;

class Counter
{

    /**
     * Count the number of words in a text and store the occurrences
     * @param string $text
     * @return int
     */
    public function wordCount(string $text): int
    {
        $words = array_filter(explode(" ", preg_replace("/[^\w'+]/", " ", $text)));
        return count($words);
    }

    public function sentenceCount($text)
    {
        return count(preg_split("/\.(\\s|\n|$)/", $text, -1, PREG_SPLIT_NO_EMPTY));
    }

    /**
     * return the occurrences of every words
     * @param string $text
     * @return array
     */
    public function getOccurrences(string $text): array
    {
        $occurrences = [];
        $words = array_filter(explode(" ", preg_replace("/[^\w'+]/", " ", $text)));
        foreach ($words as $word) {
            if (array_key_exists(strtolower($word), $occurrences)) {
                $occurrences[strtolower($word)] += 1;
            } else {
                $occurrences[strtolower($word)] = 1;
            }
        }
        return $occurrences;
    }

}
