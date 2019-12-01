<?php

Route::group(["namespace" => "Shuvo\Errorlog\Http\Controllers"], function () {

    Route::get("error-log","ErrorlogController@errorLog")->name("error_log");

    Route::get("error-log-status-change/{id}","ErrorlogController@errorLogStatusChange")->name("error_log_status_change");

    Route::get("error-log-delete/{id}","ErrorlogController@errorLogDelete")->name("error_log_delete");

    Route::get("error-log-all-delete","ErrorlogController@errorLogAllDelete")->name("error_log_all_delete");
});

