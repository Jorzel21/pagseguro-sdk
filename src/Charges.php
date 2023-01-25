<?php

namespace Jorzel\PagSeguro;

use Jorzel\PagSeguro\Utils\Connection;
use Jorzel\PagSeguro\Utils\Helpers;

class Charges
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

    /*
     * Get a charge.
     *
     * @param string $id
     * @return array
     */
    public function get($id)
    {
        try {
            $this->validateGetCharge(
              ['id' => $id]
            );

            return $this->http->get('/charges/'.$id);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create a credit card charge.
     *
     * @param array $data
     * @return array
     */
    public function creditCard($data)
    {
        try {
            $this->validateCreditCardCharge($data);

            return $this->http->post('/charges', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * create a token credit card charge
     *
     * @param array $data
     * @return array
     */
    public function tokenCreditCard($data)
    {
        try {
            $this->validateCreditCardTokenCharge($data);

            return $this->http->post('/charges', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }


    /*
     * Create a boleto charge.
     *
     * @param array $data
     * @return array
     */
    public function boleto($data)
    {
        try {
            $this->validateBoletoCharge($data);

            return $this->http->post('/charges', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
