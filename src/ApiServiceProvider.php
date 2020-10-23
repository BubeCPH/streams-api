<?php

namespace Streams\Api;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Streams\Api\Http\Controller\EntriesController;
use Streams\Api\Http\Controller\StreamsController;

/**
 * Class ApiServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ApiServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Route::prefix('api')->middleware('api')->group(function () {
            
            Route::get('streams', StreamsController::class . '@index');
            Route::post('streams', StreamsController::class . '@post');

            Route::get('streams/{stream}', StreamsController::class . '@show');
            Route::put('streams/{stream}', StreamsController::class . '@put');
            Route::patch('streams/{stream}', StreamsController::class . '@patch');
            Route::delete('streams/{stream}', StreamsController::class . '@delete');

            Route::get('entries/{stream}', EntriesController::class . '@index');
            Route::post('entries/{stream}', EntriesController::class . '@post');

            Route::get('entries/{stream}/{entry}', EntriesController::class . '@show');
            Route::put('entries/{stream}/{entry}', EntriesController::class . '@put');
            Route::patch('entries/{stream}/{entry}', EntriesController::class . '@patch');
            Route::delete('entries/{stream}/{entry}', EntriesController::class . '@delete');
        });
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        //
    }
}
