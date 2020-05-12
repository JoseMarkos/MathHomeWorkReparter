<?php

declare(strict_types=1);

return [
    [
        'GET',
        '/',
        'SocialNews\FrontPage\Presentation\FrontPageController#show'
    ],

    [
        'GET',
        '/submit',
        'SocialNews\Submission\Presentation\SubmissionController#show'
    ],

    [
        'GET',
        '/hwmathib',
        'SocialNews\SplitHomeWork\Presentation\SplitHomeWorkController#show'
    ]
];