<?php

require 'vendor/autoload.php';

use App\Core\{Router, Request};

Router::load('routes.php')
    ->direct();


