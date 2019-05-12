<?php

namespace vagrant/parser;


class Parser implements ParserInterface
{
    public function process(string $url, string $tag): array
    {
        $htmlPage = file_get_contents($url);

        if ($htmlPage === false) {
            return ['Invalid URL'];
        }
        preg_match_all('/>' . $tag . '.*?>(.*?)<\/' . $tag . '>/s' . $htmlPage, $strings);

        if (empty($strings[1])) {
            return ['There are no such tags on the page'];
        }

        return $strings[1];

    }
}