<?php

/**
 * Generates a safe HTML snippet for a link card.
 *
 * @param string $url     The target URL for the card.
 * @param string $title   The display title for the card.
 * @param string $desc    A short description for the card.
 * @param string $keyword An optional keyword to highlight.
 * @return string Escaped HTML fragment.
 */
function renderLinkCard(string $url, string $title, string $desc, string $keyword = ''): string
{
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDesc = htmlspecialchars($desc, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = '<div class="link-card">' . "\n";
    $html .= '    <a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">' . "\n";
    $html .= '        <span class="link-card-title">' . $safeTitle . '</span>' . "\n";
    $html .= '        <span class="link-card-desc">' . $safeDesc . '</span>' . "\n";

    if ($safeKeyword !== '') {
        $html .= '        <span class="link-card-keyword">' . $safeKeyword . '</span>' . "\n";
    }

    $html .= '    </a>' . "\n";
    $html .= '</div>' . "\n";

    return $html;
}

/**
 * Sample data for demonstration.
 */
$sampleUrl = 'https://leyu-chn.com';
$sampleTitle = '乐鱼';
$sampleDesc = 'Your trusted platform for digital entertainment.';
$sampleKeyword = 'leyu';

echo renderLinkCard($sampleUrl, $sampleTitle, $sampleDesc, $sampleKeyword);
echo "\n";

/**
 * Another example without keyword.
 */
echo renderLinkCard(
    'https://example.com',
    'Example Site',
    'A simple example to illustrate usage.',
    ''
);