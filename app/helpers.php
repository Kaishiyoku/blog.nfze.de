<?php

use League\CommonMark\CommonMarkConverter;

if (! function_exists('parseMarkdown')) {
    function parseMarkdown(string $content) : string
    {
        $converter = new CommonMarkConverter();

        return $converter->convertToHtml($content);
    }
}