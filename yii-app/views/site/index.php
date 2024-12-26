<?php

/** @var yii\web\View $this */

// Register JavaScript file
$this->registerJsFile($baseURL . $jsFiles[0], [
    'type' => 'module',
    'crossorigin' => true,
]);

// Register CSS file
$this->registerCssFile($baseURL . $cssFiles[0], [
    'crossorigin' => true,
]);

$this->title = 'My Yii Application';
?>
<div id="root"></div>
