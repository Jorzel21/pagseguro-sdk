<?php

namespace Jorzel\PagSeguro;

use Jorzel\PagSeguro\Utils\Connection;
use Jorzel\PagSeguro\Utils\Helpers;

class Pix
{
    use Helpers;

    protected $http;

    /*
     * Create a new Connection instance.
     *
     * @return void
     */
    public function __construct($accessToken)
    {
        $this->http = new Connection($accessToken);
    }
}
