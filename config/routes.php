<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

// home
$app->get('/', App\Action\HomePageAction::class);
// home for all routes that don't go to the backend
$app->get('/{url}', App\Action\HomePageAction::class, 'home');


// index
$app->get('/api/appointments', [App\Action\AppointmentAction::class, 'index']);
// create
$app->post('/api/appointments', [App\Action\AppointmentAction::class, 'create']);
// read
$app->get('/api/appointments/{id:[0-9]+}', [App\Action\AppointmentAction::class, 'read']);
// update
$app->patch('/api/appointments/{id:[0-9]+}', [App\Action\AppointmentAction::class, 'update']);
// delete
$app->delete('/api/appointments/{id:[0-9]+}', [App\Action\AppointmentAction::class, 'delete']);

