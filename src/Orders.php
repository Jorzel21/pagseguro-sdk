<?php

namespace Jorzel\PagSeguro;

use Jorzel\PagSeguro\Utils\Connection;
use Jorzel\PagSeguro\Utils\Helpers;

class Orders
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

            return $this->http->get('/orders/'.$id);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create a order with QrCode payment.
     *
     * @param array $data
     * @return array
     */
    public function qrCode($data)
    {
        try {
            $this->validateQrCodeOrder($data);

            return $this->http->post('/orders', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

        /*
     * Create a order with QrCode payment.
     *
     * @param array $data
     * @return array
     */
    public function boleto($data)
    {
        try {
            $this->validateBoletoOrder($data);

            return $this->http->post('/orders', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

        /*
     * Create a order with QrCode payment.
     *
     * @param array $data
     * @return array
     */
    public function creditCard($data)
    {
        try {
            $this->validateCreditCardOrder($data);

            return $this->http->post('/orders', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

        /*
     * Create a order with QrCode payment.
     *
     * @param array $data
     * @return array
     */
    public function creditCardToken($data)
    {
        try {
            $this->validateCreditCardTokenOrder($data);

            return $this->http->post('/orders', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
