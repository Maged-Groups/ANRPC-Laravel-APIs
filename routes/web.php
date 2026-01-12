<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OutsourceController;
use App\Http\Controllers\SupplierController;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('suppliers', 'App\Http\Controllers\SupplierController@index');
// Route::get('suppliers/id', 'App\Http\Controllers\SupplierController@show');
// Route::get('suppliers/create', 'App\Http\Controllers\SupplierController@create');
// Route::get('suppliers/search', 'App\Http\Controllers\SupplierController@search');

// Route::resource('suppliers', SupplierController::class);
// Route::resource('customers', CustomerController::class);
// Route::resource('employees', EmployeeController::class);
// Route::resource('orders', OrderController::class);
// Route::resource('books', BookController::class);
// Route::resource('outsources', OutsourceController::class);

Route::apiResources([
    'suppliers' => SupplierController::class,
    'customers' => CustomerController::class,
    'employees' => EmployeeController::class,
    'orders' => OrderController::class,
    'books' => BookController::class,
    'outsources' => OutsourceController::class,
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


Route::get('test', function () {
    $users = User::get();
    $user = $users->random();
    $id = $user->id;

    $user_id = User::get()->random()->id;
    return $user_id;
});