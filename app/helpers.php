<?php

use App\Libraries\Markdown\CustomMarkdown;

if (! function_exists('parseMarkdown')) {
    function parseMarkdown(string $content) : string
    {
        $parser = new CustomMarkdown();

        return $parser->parse($content);
    }
}