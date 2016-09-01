<?php
#Installation script Routes
Route::group(array('prefix'=>'install','before'=>'install'),function() {
    Route::get('/','InstallController@index');
    Route::get('/database','InstallController@getDatabase');
    Route::post('/database','InstallController@postDatabase');
    Route::get('/user','InstallController@getUser');
    Route::post('/user','InstallController@postUser');
});

Route::group(['middleware' => 'install'], function(){
    Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    ]);
Route::group(['middleware' => 'auth'], function(){
    #home controller
    Route::get('/',   'HomeController@index');
    Route::get('home','HomeController@index');
    #Resources Routes
    Route::resources([
        'users'     => 'UsersController',
        'clients'   => 'ClientsController',
        'invoices'  => 'InvoicesController',
        'products'  => 'ProductsController',
        'expenses'  => 'ExpensesController',
        'estimates' => 'EstimatesController',
        'payments'  => 'PaymentsController',
    ]);
    #Grouped Routes
    Route::group(array('prefix'=>'settings'),function()
    {
        Route::resource('company', 'SettingsController', array('only' => array('index', 'store', 'update') ));
        Route::resource('invoice', 'InvoiceSettingsController', array('only' => array('index', 'store', 'update') ));
        Route::resource('email', 'EmailSettingsController', array('only' => array('index', 'store', 'update') ));
        Route::resource('estimate', 'EstimateSettingsController', array('only' => array('index', 'store', 'update') ));
        Route::resource('tax', 'TaxSettingsController');
        Route::resource('templates', 'TemplatesController', array('only' => array('index','show', 'store', 'update') ));
        Route::resource('number', 'NumberSettingsController', array('only' => array('index', 'store', 'update') ));
        Route::resource('payment', 'PaymentMethodsController', array('except' => array('show', 'create') ));
        Route::resource('currency', 'CurrencyController', array('except' => array('show', 'create') ));
        Route::resource('translations', 'TranslationsController');
    });
    # estimates resource
    Route::group(array('prefix'=>'estimates'),function()
    {
        Route::post('deleteItem', 'EstimatesController@deleteItem');
        Route::get('pdf/{id}', 'EstimatesController@estimatePdf');
        Route::get('send/{id}', 'EstimatesController@send');
    });
    # invoices resource
    Route::group(array('prefix'=>'invoices'),function()
    {
        Route::post('deleteItem', 'InvoicesController@deleteItem');
        Route::post('ajaxSearch', 'InvoicesController@ajaxSearch');
        Route::get('pdf/{id}', 'InvoicesController@invoicePdf');
        Route::get('send/{id}', 'InvoicesController@send');
    });
    # reports resource
    Route::group(array('prefix'=>'reports'),function() {
        Route::get('/', 'ReportsController@index');
        Route::post('general', 'ReportsController@general_summary');
        Route::post('payment_summary', 'ReportsController@payment_summary');
        Route::post('client_statement', 'ReportsController@client_statement');
        Route::post('invoices_report', 'ReportsController@invoices_report');
        Route::post('expenses_report', 'ReportsController@expenses_report');
    });
    # products custom routes
    Route::get('products_modal', 'ProductsController@products_modal');
    Route::post('process_products_selections', 'ProductsController@process_products_selections');
    # Profile
    Route::get('profile', ['uses' => 'ProfileController@edit']);
    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
    Route::post('profile', ['uses' => 'ProfileController@update']);
    Route::post('reports/ajaxData', 'ReportsController@ajaxData');
    Route::controller('translations', '\Barryvdh\TranslationManager\Controller');
    Route::get('products_modal', 'ProductsController@products_modal');
    Route::get('process_products_selections', 'ProductsController@process_products_selections');
    Route::get('products_modal', 'ProductsController@products_modal');
    Route::get('dashboard', 'dashboardController@dashboard');   
});
});