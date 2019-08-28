<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('property-categories/destroy', 'PropertyCategoryController@massDestroy')->name('property-categories.massDestroy');

    Route::resource('property-categories', 'PropertyCategoryController');

    Route::delete('property-tags/destroy', 'PropertyTagController@massDestroy')->name('property-tags.massDestroy');

    Route::resource('property-tags', 'PropertyTagController');

    Route::delete('properties/destroy', 'PropertyController@massDestroy')->name('properties.massDestroy');

    Route::resource('properties', 'PropertyController');

    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');

    Route::resource('expense-categories', 'ExpenseCategoryController');

    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');

    Route::resource('income-categories', 'IncomeCategoryController');

    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');

    Route::resource('expenses', 'ExpenseController');

    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');

    Route::resource('incomes', 'IncomeController');

    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');

    Route::resource('expense-reports', 'ExpenseReportController');

    Route::delete('landlords/destroy', 'LandlordController@massDestroy')->name('landlords.massDestroy');

    Route::resource('landlords', 'LandlordController');

    Route::delete('tenants/destroy', 'TenantController@massDestroy')->name('tenants.massDestroy');

    Route::resource('tenants', 'TenantController');

    Route::get('tenants/create/getvacant/{id}', 'TenantController@getvacant')->name('tenants.create.getvacant');

    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');

    Route::resource('payments', 'PaymentController');

    Route::get('payments/create/gettenant/{id}', 'PaymentController@gettenant')->name('payments.create.gettenant');

    Route::post('payments/media', 'PaymentController@storeMedia')->name('payments.storeMedia');

    Route::put('payments/confirm/{id}', 'PaymentController@confirm')->name('payments.confirm');

    Route::delete('vacancies/destroy', 'VacancyController@massDestroy')->name('vacancies.massDestroy');

    Route::resource('vacancies', 'VacancyController');

    Route::delete('requistions/destroy', 'RequistionController@massDestroy')->name('requistions.massDestroy');

    Route::resource('requistions', 'RequistionController');

    Route::delete('reports/destroy', 'ReportController@massDestroy')->name('reports.massDestroy');

    Route::resource('reports', 'ReportController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::delete('emails/destroy', 'EmailController@massDestroy')->name('emails.massDestroy');

    Route::resource('emails', 'EmailController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::delete('messages/destroy', 'MessageController@massDestroy')->name('messages.massDestroy');

    // Route::resource('messages', 'MessageController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
    // Route::get('messages/messages', 'MessageController@fetchMessages');
    // Route::post('messages/messages', 'MessageController@sendMessage');
    // Route::get('messages', 'MessageController@index');
    // Route::post('messages', 'MessageController@index');

    // Route::get('messages', 'MessageController@index')->name('messages.index');
    Route::get('messages/private', 'MessageController@private')->name('message.private');
    Route::get('messages/users', 'MessageController@users')->name('message.users');

    Route::get('messages', 'MessageController@fetchMessages')->name('messages.index');;
    Route::post('messages', 'MessageController@sendMessage');
    // Route::get('messages/private-messages/{user}', 'MessageController@privateMessages')->name('privateMessages');
    // Route::post('messages/private-messages/{user}', 'MessageController@sendPrivateMessage')->name('privateMessages.store');

    Route::delete('receipts/destroy', 'ReceiptController@massDestroy')->name('receipts.massDestroy');

    Route::resource('receipts', 'ReceiptController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
    Route::get('receipts/{id}/download', 'ReceiptController@download')->
    name('receipts.download');
    Route::get('receipts/{id}/print/', 'ReceiptController@print')->
    name('receipts.print');

    Route::delete('landlord-banks/destroy', 'LandlordBankController@massDestroy')->name('landlord-banks.massDestroy');

    Route::resource('landlord-banks', 'LandlordBankController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
