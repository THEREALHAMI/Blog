<?php
//todo: Namen für die Routen
return [
    'routes' => [
        '/' => Controller\Home::class,
        '/login' => Controller\Login::class,
        '/detail' => Controller\Detail::class,
        '/logout' => Controller\Logout::class,
        '/impressum' => Controller\Impressum::class,
        '/eintrag' => Controller\AddEntrie::class,
        '/addComment' => Controller\AddComment::class
    ],
    'factories' => [
        \Repository\Comment::class => \Factory\Repository\Comment::class,
        \Repository\Entry::class => \Factory\Repository\Entry::class,
        \Repository\User::class => \Factory\Repository\User::class,
        \PDO::class => Factory\PdoFactory::class,
        \Controller\Home::class => \Factory\Controller\Home::class,
        \Controller\Login::class => \Factory\Controller\Login::class,
        \Login\Engine::class => \Factory\Controller\LoginEngine::class,
        \Controller\AddEntrie::class => \Factory\Controller\AddEntrie::class,
        \Controller\Detail::class => \Factory\Controller\Detail::class,
        \Controller\AddComment::class => \Factory\Controller\AddComment::class,
        \Controller\Logout::class => \Factory\Controller\Logout::class,
        \Controller\Impressum::class => \Factory\Controller\Impressum::class,
    ]
];
