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

    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');

    Route::resource('product-categories', 'ProductCategoryController');

    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');

    Route::resource('product-tags', 'ProductTagController');

    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductController');

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

    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');

    Route::resource('payments', 'PaymentController');

    Route::post('payments/media', 'PaymentController@storeMedia')->name('payments.storeMedia');

    Route::delete('vacancies/destroy', 'VacancyController@massDestroy')->name('vacancies.massDestroy');

    Route::resource('vacancies', 'VacancyController');

    Route::delete('requistions/destroy', 'RequistionController@massDestroy')->name('requistions.massDestroy');

    Route::resource('requistions', 'RequistionController');

    Route::delete('reports/destroy', 'ReportController@massDestroy')->name('reports.massDestroy');

    Route::resource('reports', 'ReportController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::delete('emails/destroy', 'EmailController@massDestroy')->name('emails.massDestroy');

    Route::resource('emails', 'EmailController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::delete('messages/destroy', 'MessageController@massDestroy')->name('messages.massDestroy');

    Route::resource('messages', 'MessageController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::delete('receipts/destroy', 'ReceiptController@massDestroy')->name('receipts.massDestroy');

    Route::resource('receipts', 'ReceiptController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
});
