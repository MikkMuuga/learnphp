<?php

echo '<code>';
var_dump($_SERVER);
echo '</code>';

switch($_SERVER['REQUEST_URI']) {
    case '/':
        include __DIR__ . '/../views/index.php';
        break;
    case '/us':
        include __DIR__ . '/../views/us.php';
        break;
    default:
    echo '404  page not found'
}