<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('product-categories', 'ProductCategoryApiController');

    Route::apiResource('product-tags', 'ProductTagApiController');

    Route::apiResource('products', 'ProductApiController');

    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    Route::apiResource('expenses', 'ExpenseApiController');

    Route::apiResource('incomes', 'IncomeApiController');

    Route::apiResource('expense-reports', 'ExpenseReportApiController');

    Route::apiResource('landlords', 'LandlordApiController');

    Route::apiResource('tenants', 'TenantApiController');

    Route::apiResource('payments', 'PaymentApiController');

    Route::apiResource('vacancies', 'VacancyApiController');

    Route::apiResource('requistions', 'RequistionApiController');
});
