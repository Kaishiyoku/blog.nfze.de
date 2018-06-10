<?php

namespace App\Libraries\Markdown;

/**
 * Adds the block quote elements
 */
trait QuoteTrait
{
    /**
     * identify a line as the beginning of a block quote.
     */
    protected function identifyQuote($line)
    {
        return $line[0] === '>' && (!isset($line[1]) || ($l1 = $line[1]) === ' ' || $l1 === "\t");
    }

    /**
     * Consume lines for a blockquote element
     */
    protected function consumeQuote($lines, $current)
    {
        // consume until newline
        $content = [];
        $footer = null;
        for ($i = $current, $count = count($lines); $i < $count; $i++) {
            $line = $lines[$i];
            if (ltrim($line) !== '') {
                if ($line[0] == '>' && !isset($line[1])) {
                    $line = '';
                } elseif (strncmp($line, '> ', 2) === 0) {
                    $line = substr($line, 2);
                }

                if ($line[0] == '-') {
                    $footer = substr($line, 2);
                } else {
                    $content[] = $line;
                }
            } else {
                break;
            }
        }

        $block = [
            'quote',
            'content' => $this->parseBlocks($content),
            'footer' => $footer,
            'simple' => true,
        ];
        return [$block, $i];
    }


    /**
     * Renders a blockquote
     */
    protected function renderQuote($block)
    {
        return '<blockquote class="blockquote">'
            . $this->renderAbsy($block['content'])
            . '<footer class="blockquote-footer">' . $block['footer'] . '</footer>'
            . "</blockquote>\n";
    }

    abstract protected function parseBlocks($lines);
    abstract protected function renderAbsy($absy);
}
