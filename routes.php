<?php

use App\Core\Router;

Router::resource('users');
Router::resource('doctor');
Router::resource('patients');
Router::resource('patients.metrics');