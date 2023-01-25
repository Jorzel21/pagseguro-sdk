<?php

namespace Jorzel\PagSeguro\Utils;

use Illuminate\Support\Facades\Validator;

trait Helpers
{

        /*
     * Validate data for create a credit card charge.
     *
     * @param array $data
     * @return void
     */
    public function validateGetCharge($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for create a credit card charge.
     *
     * @param array $data
     * @return void
     */
    public function validateCreditCardCharge($data)
    {
        $validator = Validator::make($data, [
            'reference_id' => 'required|string',
            'description' => 'required|string',
            'amount.value' => 'required|integer',
            'amount.currency' => 'required|string',
            'payment_method.type' => 'required|string',
            'payment_method.installments' => 'required|string',
            'payment_method.capture' => 'required|boolean',
            'payment_method.card.number' => 'required|string',
            'payment_method.card.store' => 'required|boolean',
            'payment_method.card.exp_month' => 'required|string',
            'payment_method.card.exp_year' => 'required|string',
            'payment_method.card.security_code' => 'required|string',
            'payment_method.card.holder.name' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for create a charge with credit card token.
     *
     * @param array $data
     * @return void
     */
    public function validateCreditCardTokenCharge($data)
    {
        $validator = Validator::make($data, [
            'reference_id' => 'required|string',
            'description' => 'required|string',
            'amount.value' => 'required|integer',
            'amount.currency' => 'required|string',
            'payment_method.type' => 'required|string',
            'payment_method.installments' => 'required|string',
            'payment_method.capture' => 'required|boolean',
            'payment_method.card.encrypted' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

        /*
     * Validate data for create a boleto charge.
     *
     * @param array $data
     * @return void
     */
    public function validateBoletoCharge($data)
    {
        $validator = Validator::make($data, [
            'reference_id' => 'required|string',
            'description' => 'required|string',
            'amount.value' => 'required|integer',
            'amount.currency' => 'required|string',
            'payment_method.type' => 'required|string',
            'payment_method.boleto.due_date' => 'required|string',
            'payment_method.boleto.instruction_lines.line_1' => 'nullalble|string',
            'payment_method.boleto.instruction_lines.line_2' => 'nullalble|string',
            'payment_method.boleto.holder' => 'required|string',
            'payment_method.boleto.holder.name' => 'required|string',
            'payment_method.boleto.holder.tax_id' => 'required|string',
            'payment_method.boleto.holder.email' => 'required|string',
            'payment_method.boleto.holder.address.street' => 'required|string',
            'payment_method.boleto.holder.address.number' => 'required|string',
            'payment_method.boleto.holder.address.locality' => 'required|string',
            'payment_method.boleto.holder.address.city' => 'required|string',
            'payment_method.boleto.holder.address.region' => 'required|string',
            'payment_method.boleto.holder.address.region_code' => 'required|string',
            'payment_method.boleto.holder.address.country' => 'required|string',
            'payment_method.boleto.holder.address.postal_code' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }
}
