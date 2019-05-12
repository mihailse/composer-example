<?php

interface ParserInterface
{
    public function process(string $url, string $tag): array;
}