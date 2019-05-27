<?php

return [
    'production' => false,
    'baseUrl' => 'https://www.jesusflores.dev',
    'site' => [
        'title' => 'My stuff',
        'description' => 'The stuff I make',
        'image' => 'default-share.png',
    ],
    'owner' => [
        'name' => 'Jesús Flores',
        'twitter' => '',
        'github' => 'sh4ka',
    ],
    'services' => [
        'analytics' => 'UA-140882082-1',
        'disqus' => 'jesusflores-dev',
        'cloudinary' => 'dervmg1zk',
        'jumprock' => 'jesusfloresdev',
    ],
    'collections' => [
        'posts' => [
            'path' => 'blog/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
        ],
        'tags' => [
            'path' => 'tags/{filename}',
            'extends' => '_layouts.tag',
            'section' => '',
            'name' => function ($page) {
                return $page->getFilename();
            },
        ],
    ],
    'excerpt' => function ($page, $limit = 250, $end = '...') {
        return $page->isPost
            ? str_limit_soft(content_sanitize($page->getContent()), $limit, $end)
            : null;
    },
    'imageCdn' => function ($page, $path) {
        return "https://res.cloudinary.com/{$page->services->cloudinary}/{$path}";
    },
];
