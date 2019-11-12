<?php

use Illuminate\Http\Request;
Use App\users;
Use App\books;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'users' => 'UsersController',
    'books' => 'BooksController',
    'borrows' => 'BorrowsController'
]);

Route::POST('login', 'UsersController@login');

// Route::GET('borrows', function(){
//         $user = users::findOrFail(1);
       
//         return $user->books;

// });
 
// Route::get('users', function() {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return users::all();
// });
 
// Route::get('users/{id}', function($id) {
//     return users::find($id);
// });

// Route::post('users', function(Request $request) {
//     return users::create($request->all);
// });

// Route::put('users/{id}', function(Request $request, $id) {
//     $user = users::findOrFail($id);
//     $user->update($request->all());

//     return $user;
// });

// Route::delete('users/{id}', function($id) {
//     users::find($id)->delete();

//     return 204;
// });

// books

// Route::get('books', function() {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return books::all();
// });
 
// Route::get('books/{id}', function($id) {
//     return books::find($id);
// });

// Route::post('books', function(Request $request) {
//     return books::create($request->all);
// });

// Route::put('books/{id}', function(Request $request, $id) {
//     $books = books::findOrFail($id);
//     $books->update($request->all());

//     return $books;
// });

// Route::delete('books/{id}', function($id) {
//     books::find($id)->delete();

//     return 204;
// });

