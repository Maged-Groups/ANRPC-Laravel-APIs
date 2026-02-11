<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostStatusController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\ReactionTypeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Unprotected Routes
Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post('login', 'login');
        Route::post('forget-password', 'forgetPassword');
        Route::post('reset-password', 'resetPassword');
    });

// Protected Routes
Route::middleware(['auth:sanctum'])
    ->group(function () {

        // Auth routes
        Route::controller(AuthController::class)
            ->prefix('auth')
            ->group(function () {
                Route::get('all-sessions', 'allSessions');
                Route::delete('session/{id}', 'logoutSession');
                Route::post('logout', 'logout');
                Route::get('profile', 'profile');
                Route::post('change-password', 'changePassword');
            });

        // Custom routes
        Route::prefix('replies')->controller(ReplyController::class)->group(function () {
            Route::get('deleted', 'deleted');
            Route::get('restore/{reply}', 'restore');
            Route::get('restore-all', 'restore_all');
            Route::post('restore-some', 'restore_some');
            Route::delete('force-delete/{reply}', 'force_delete');
            Route::delete('force-delete-all', 'force_delete_all');
        });

        Route::apiResources([
            'users' => UserController::class,
            'posts' => PostController::class,
            'post-statuses' => PostStatusController::class,
            'reaction-types' => ReactionTypeController::class,
            'comments' => CommentController::class,
            'replies' => ReplyController::class,
            'reactions' => ReactionController::class,
        ]);
    });
