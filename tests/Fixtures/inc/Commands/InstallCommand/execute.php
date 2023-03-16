<?php

return [
    'vfs_dir' => '/',
    'structure' => [
        'inc' => [
            'Plugin.php' => file_get_contents(ROCKER_LAUNCHER_DATABASE_TESTS_FIXTURES_DIR . '/files/plugin.php'),
        ],
        'composer.json' => file_get_contents(ROCKER_LAUNCHER_DATABASE_TESTS_FIXTURES_DIR . '/files/composer.json'),
        'tests' => [
            'Fixtures' => [
                'classes' => [

                ]
            ],
            'Integration' => [

            ],
            'Unit' => [
                'inc' => [

                ],
            ]
        ]
    ],
    'test_data' => [
        'shouldInstall' => [
            'config' => [
                'composer_content' => file_get_contents(ROCKER_LAUNCHER_DATABASE_TESTS_FIXTURES_DIR . '/files/composer.json'),
                'composer_path' => 'composer.json',
            ],
            'expected' => [
                'composer_content' => file_get_contents(__DIR__ . '/files/composer.json'),
                'composer_path' => 'composer.json',
            ]
        ],
        'shouldNotInstall' => [
            'config' => [
                'composer_content' => file_get_contents(__DIR__ . '/files/composer.json'),
                'composer_path' => 'composer.json',
            ],
            'expected' => [
                'composer_content' => file_get_contents(__DIR__ . '/files/composer.json'),
                'composer_path' => 'composer.json',
            ]
        ],
    ]
];
