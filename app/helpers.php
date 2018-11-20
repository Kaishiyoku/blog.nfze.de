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

if (! function_exists('getPageRanges')) {
    function getPageRanges($currentPage, $lastPage)
    {
        $pageOffset = env('PAGINATION_PAGE_OFFSET');
        $numberOfPages = $pageOffset + 1;
        $maxOverflow = env('PAGINATION_MAX_OVERFLOW');
        $numberOfPagesWithMaxOverflow = $numberOfPages + $maxOverflow;
        $ranges = [];

        $leftStart = 1;
        $leftEnd = $numberOfPages;

        if ($currentPage >= $leftEnd) {
            if ($currentPage <= $leftEnd + $maxOverflow) {
                $leftEnd = $currentPage + 1;
            } else {
                $leftEnd = 1;
            }
        }

        $leftEnd = $leftEnd <= $lastPage ? $leftEnd : $lastPage;

        $ranges[] = [
            'start' => $leftStart,
            'end' => $leftEnd
        ];

        if ($currentPage > $numberOfPagesWithMaxOverflow && $currentPage <= $lastPage - $numberOfPagesWithMaxOverflow) {
            $middleStart = $currentPage - $pageOffset;
            $middleEnd = $currentPage + $pageOffset;

            if ($middleStart > 0) {
                $ranges[] = [
                    'start' => $middleStart,
                    'end' => $middleEnd
                ];
            }
        }

        $rightStart = $lastPage - $numberOfPages + 1;
        $rightEnd = $lastPage;

        if ($currentPage <= $rightStart) {
            if ($currentPage >= $rightStart - $maxOverflow) {
                $rightStart = $currentPage - 1;
            } else {
                $rightStart = $lastPage;
            }
        }

        if ($leftEnd < $rightStart) {
            $ranges[] = [
                'start' => $rightStart,
                'end' => $rightEnd
            ];
        }

        return $ranges;
    }
}