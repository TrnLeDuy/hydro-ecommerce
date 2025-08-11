<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/contact', 'middleware' => ['api.token', 'auth.admin']], function (Router $router) {
    $router->get('contacts', [
        'as' => 'api.contact.contact.indexServerSide',
        'uses' => 'ApiContactController@indexServerSide',
        'middleware' => 'can:contact.contacts.index'
    ]);
    $router->get('contacts/find', [
        'as' => 'api.contact.contact.find',
        'uses' => 'ApiContactController@find',
        'middleware' => 'can:contact.contacts.index'
    ]);
    $router->post('contacts/{contactId}/update', [
        'as' => 'api.contact.contact.update',
        'uses' => 'ApiContactController@update',
        'middleware' => 'can:contact.contacts.edit'
    ]);
    $router->delete('contacts/{contactId}/destroy', [
        'as' => 'api.contact.contact.destroy',
        'uses' => 'ApiContactController@destroy',
        'middleware' => 'can:contact.contacts.destroy'
    ]);
});