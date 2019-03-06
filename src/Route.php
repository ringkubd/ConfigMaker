<?php

Route::namespace('Anwar\ConfigMaker\Controllers')->prefix('config-maker/')->group(function(){
    Route::get("/","ConfigController@index");
    Route::get("/folder/{folderName}/{folderid}","ConfigController@insideFolder")->name('config-maker.insideFolder');
    Route::get("/file-contents/{filename}","ConfigController@fileContents")->name('config-maker.fileContents');
    Route::post("/update-config","ConfigController@updateConfig")->name('config-maker.updateConfig');
});
