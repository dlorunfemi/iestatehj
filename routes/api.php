<?php

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('property-categories', 'PropertyCategoryApiController');

    Route::apiResource('property-tags', 'PropertyTagApiController');

    Route::apiResource('properties', 'PropertyApiController');

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
