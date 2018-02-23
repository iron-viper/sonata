<?php

namespace AppBundle\Component;

use Symfony\Component\BrowserKit\Client as BaseClient;
use Symfony\Component\BrowserKit\Response;

class Client extends BaseClient
{
    protected function doRequest($request)
    {
        // ... convert request into a response

        return new Response();
    }
}
