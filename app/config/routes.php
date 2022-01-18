<?php

return [

    'GET' => [
        // MainController

        '' => [
            'controller' => 'main',
            'action' => 'index',
        ],
        'contact' => [
            'controller' => 'main',
            'action' => 'contact',
        ],

        // AccountController

        'login' => [
            'controller' => 'account',
            'action' => 'login'
        ],
        'register' => [
            'controller' => 'account',
            'action' => 'register'
        ],
        'profile' => [
            'controller' => 'account',
            'action' => 'profile'
        ],
        'profile/mylist/anime' => [
            'controller' => 'account',
            'action' => 'animeList'
        ],
        'message' => [
            'controller' => 'account',
            'action' => 'message'
        ],
        'message/{id:\d+}' => [
            'controller' => 'account',
            'action' => 'messenger'
        ],
        'friends' => [
            'controller' => 'account',
            'action' => 'friends'
        ],
        'user/{id:\d+}' => [
            'controller' => 'account',
            'action' => 'user'
        ],

        // AnimeController

        'anime/all' => [
            'controller' => 'anime',
            'action' => 'all'
        ],
        'anime/search' => [
            'controller' => 'anime',
            'action' => 'search'
        ],
        'anime/{id:\d+}' => [
            'controller' => 'anime',
            'action' => 'anime'
        ],

        // AdminController

        'admin/login' => [
            'controller' => 'admin',
            'action' => 'login'
        ],
        'admin/add' => [
            'controller' => 'admin',
            'action' => 'add'
        ],
        'admin/delete/{id:\d+}' => [
            'controller' => 'admin',
            'action' => 'delete'
        ],

        'admin/edit/{id:\d+}' => [
            'controller' => 'admin',
            'action' => 'edit'
        ],
        'admin/logout' => [
            'controller' => 'admin',
            'action' => 'logout'
        ],
    ],
    'POST' => [
        // AnimeController

        'anime/{id:\d+}' => [
            'controller' => 'anime',
            'action' => 'animeComment'
        ],
    ]

];