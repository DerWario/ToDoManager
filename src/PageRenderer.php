<?php

namespace src;

class PageRenderer
{
    public static function renderHead(): void
    {
        echo '<html>';
        echo '<head>';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">';
        echo '<script src="public/js/listsaver.js"></script>';
        echo '</head>';

    }

    public static function renderBodyStart(string $listName): void
    {
        echo '<header class="container">
                  <hgroup>
                    <h1>ToDoList</h1>
                    <h2>Check all the Things you know and it will be saved in your Browser!</h2>
                  </hgroup>
                </header>
                <body>
                    <main class="container main-container">'
        ;
    }

    public static function renderFooter():void
    {
        echo '</main>
            <footer class="container">
                <small>Built with Love ♥️ by Marlon</small>
            </footer>';
    }
}