<?php

Route::namespace('Anwar\ConfigMaker')->prefix('config-maker/')->group(function(){
    Route::get("/",function (){
        echo 'Anwar\ConfigMaker';
    });
});
