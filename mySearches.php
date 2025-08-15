<?php
$searchFile = 'searches.txt';

if (file_exists($searchFile)) {
    $searches = file($searchFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($searches as $search) {
        echo '<div class="alert alert-secondary">' . htmlspecialchars($search) . '</div>';
    }
} else {
    echo '<div class="alert alert-warning">No previous searches found.</div>';
}
?>