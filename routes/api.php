<?php

header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Origin: *');

Route::post('contacts', 'ContactController@store');
