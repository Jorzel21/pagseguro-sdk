<?php

namespace Jorzel\PagSeguro;

use Jorzel\PagSeguro\Charges;
use Jorzel\PagSeguro\Pix;

class PagSeguro
{
    /*
     * @return \Jorzel\Pagseguro\Customer
     */
    public function charges($accessToken)
    {
        return new Charges($accessToken);
    }

    /*
     * @return \Jorzel\Pagseguro\Pix
     */
    public function pix($accessToken)
    {
        return new Pix($accessToken);
    }

}
