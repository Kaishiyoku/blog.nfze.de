<?php

use App\Libraries\Markdown\CustomMarkdown;
use Illuminate\Support\Carbon;

if (! function_exists('parseMarkdown')) {
    function parseMarkdown($content) : string
    {
        $parser = new CustomMarkdown();

        return $parser->parse($content);
    }
}

if (! function_exists('formatDateTime')) {
    function formatDateTime(Carbon $date) : string
    {
        return $date->formatLocalized('%m/%d/%Y %H:%M');
    }
}