<?php

require_once 'middleware.php';

// Process the request and remove headers
$response = removeHeadersMiddleware($response);

// Output the response
echo $response;

header("Location: ./public/index.php"); ?>