<?php
 
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostStatusController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\ReactionTypeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
 
Route::apiResources([
    'users' => UserController::class,
    'posts' => PostController::class,
    'posts-statuses' => PostStatusController::class,
    'reaction-type' => ReactionTypeController::class,
    'comments' => CommentController::class,
    'replies' => ReplyController::class,
    'reactions' => ReactionController::class,
]);

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
 