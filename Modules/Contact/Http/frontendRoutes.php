<?php

use Illuminate\Routing\Router;

Route::prefix('/contact')->group(function(Router $router) {
    $router->get('/', 'PublicController@createContact')->name('fe.contact.contact.create');
    $router->post('/store', 'PublicController@storeContact')->name('fe.contact.contact.store');
});
