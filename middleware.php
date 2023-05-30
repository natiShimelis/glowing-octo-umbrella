<?php

function removeHeadersMiddleware($response)
{
    header_remove('Content-Security-Policy');
    header_remove('Strict-Transport-Security');
    header_remove('X-Frame-Options');
    header_remove('X-Powered-By');
    header_remove('X-Content-Type-Options');

    return $response;
}
