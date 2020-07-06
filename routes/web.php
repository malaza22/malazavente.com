<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::group(['prefix' => 'admin'], function (){
    Voyager::routes();
    Route::match(['get', 'post'], '/connecter', 'AdminController@connecter');
    Route::match(['get', 'post'], '/inscrire', 'AdminController@inscrire');

});

Route::group(['middleware' => ['auth']], function (){
    Route::group(['prefix' => 'admin'], function (){
        Route::match(['get', 'post'], '/Dashboard', 'AdminController@Dashboard');
        Route::match(['get', 'post'], '/Category-add', 'AdminController@addcategorie');
        Route::match(['get', 'post'], '/Category-liste', 'AdminController@listecategorie');
        Route::match(['get', 'post'], '/Category-delete/{id}', 'AdminController@deleteCategory');
    
        Route::match(['get', 'post'], '/Product-add', 'AdminController@addProduct');
        Route::match(['get', 'post'], '/Product-liste', 'AdminController@listeProduct');
        Route::match(['get', 'post'], '/Product-delete/{id}', 'AdminController@deleteProduct');
        Route::post('/update-product-status', 'AdminController@updateStatusProduct');

        Route::match(['get', 'post'], '/Address-liste', 'AdminController@listeAddress');
        Route::match(['get', 'post'], '/Address-delete/{id}', 'AdminController@deleteAddress');
        Route::post('/update-address-status', 'AdminController@updateStatusAddress');

        Route::match(['get', 'post'], '/User-liste', 'AdminController@listeUser');
        Route::match(['get', 'post'], '/User-delete/{id}', 'AdminController@deleteUser');

        Route::match(['get', 'post'], '/CommandeMobile-liste', 'AdminController@listeCommandeMobile');
        Route::match(['get', 'post'], '/CommandeMobile-delete/{id}', 'AdminController@deleteCommandeMobile');
        Route::post('/update-commandeMobile-status', 'AdminController@updateStatusCommandeMobile');

        Route::match(['get', 'post'], '/CommandeCarte-liste', 'AdminController@listeCommandeCarte');
        Route::match(['get', 'post'], '/CommandeCarte-delete/{id}', 'AdminController@deleteCommandeCarte');
        // Route::post('/update-commandeCarte-status', 'AdminController@updateStatusCommandeCarte');

        Route::match(['get', 'post'], '/Vende-liste', 'AdminController@listeVende');
        Route::match(['get', 'post'], '/Vende-delete/{id}', 'AdminController@deleteVende');

    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profil','HomeController@show')->name('profile'); 
/** Products Routes */
Route::get('/','ProductController@index')->name('products.index');
Route::get('/boutique','ProductController@index')->name('products.index');
Route::get('/boutique/{slug}','ProductController@show')->name('products.show');
Route::get('/search', 'ProductController@search')->name('products.search');

/** Cart route */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/facture/{id}','HomeController@facture')->name('checkout.facture');


    Route::match(['get', 'post'], '/address','AddressController@address');
    Route::match(['get', 'post'], '/vends','ProductController@vende');

    
    Route::get('/panier','CartController@index')->name('cart.index');
    Route::post('/panier/ajouter','CartController@store')->name('cart.store');
    Route::patch('/panier/{rowId}','CartController@update')->name('cart.update');
    Route::delete('/panier/{rowId}','CartController@destroy')->name('cart.destroy');
    
    Route::get('/mobile','CheckoutController@mobile')->name('checkout.mobile');
    Route::post('/mobile','CheckoutController@commande')->name('checkout.commande');
    Route::get('/facturenonpayes','CheckoutController@facturenonpayes')->name('checkout.facturenonpayes');
    Route::get('/imprimer-facture','CheckoutController@impression')->name('checkout.imprimer');


    Route::get('/carte','CheckoutController@index')->name('checkout.carte');
    Route::post('/carte','CheckoutController@store')->name('checkout.store');
    Route::get('/merci','CheckoutController@thankyou')->name('checkout.thankYou');
    
});


