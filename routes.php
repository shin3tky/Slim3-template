<?php

use Controller\HelloController;

$app->get('/hello/version', HelloController::class . ':version');

$app->run();
