<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'src/FileLoader.php';
require_once 'src/Task.php';
require_once 'src/PageRenderer.php';

use src\FileLoader;
use src\Task;
use src\PageRenderer;



$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');




$fileLoader = new FileLoader();

PageRenderer::renderHead();
PageRenderer::renderBodyStart($path);
$tasks = Task::createFromArray('Todo', $fileLoader->load('data/' . $path . '.yaml'));


echo '<ul>' . $tasks->render() . '</ul>';

PageRenderer::renderFooter();
