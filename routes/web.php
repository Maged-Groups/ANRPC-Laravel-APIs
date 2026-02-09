<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('inti', function () {
    $models = [
        'User',
        'PostStatus',
        'ReactionType',
        'Post',
        'Comment',
        'Reply',
        'Reaction',
    ];

    foreach ($models as $model) {
        Artisan::call('make:model', [
            'name' => $model,
            '-a' => true,
        ]);

        sleep(1);
    }
});

Route::redirect('contacts', 'contact-us', 301);

Route::get('contact-us', function () {
    return 'Contact us page';
});
