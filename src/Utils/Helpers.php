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
            'payment_method.installments' => 'required|integer',
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
            'payment_method.installments' => 'required|integer',
            'payment_method.capture' => 'required|boolean',
            'payment_method.card.id' => 'required|string',
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
            'payment_method.boleto.instruction_lines.line_1' => 'nullable|string',
            'payment_method.boleto.instruction_lines.line_2' => 'nullable|string',
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
            'notification_urls' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for create a qrcode order.
     *
     * @param array $data
     * @return void
     */
    public function validateQrCodeOrder($data)
    {
        $validator = Validator::make($data, [
            'reference_id' => 'required|string',
            'customer.name' => 'required|string',
            'customer.email' => 'required|string',
            'customer.tax_id' => 'required|string',
            'items.0.name' => 'required|string',
            'items.0.quantity' => 'required|integer',
            'items.0.unit_amount' => 'required|integer',
            'qr_codes.0.amount.value' => 'required|integer',
            'qr_codes.0.expiration_date' => 'nullable|date_format:Y-m-d\\TH:i:sO',
            'notification_urls' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for create a qrcode order.
     *
     * @param array $data
     * @return void
     */
    public function validateBoletoOrder($data)
    {
        $validator = Validator::make($data, [
            'reference_id' => 'required|string',
            'customer.name' => 'required|string',
            'customer.email' => 'required|string',
            'customer.tax_id' => 'required|string',
            'charges.0.amount.value' => 'required|integer',
            'charges.0.amount.currency' => 'required|string',
            'charges.0.payment_method.type' => 'required|string',
            'charges.0.payment_method.boleto.due_date' => 'required|string',
            'charges.0.payment_method.boleto.instruction_lines.line_1' => 'nullable|string',
            'charges.0.payment_method.boleto.instruction_lines.line_2' => 'nullable|string',
            'charges.0.payment_method.boleto.holder.name' => 'required|string',
            'charges.0.payment_method.boleto.holder.tax_id' => 'required|string',
            'charges.0.payment_method.boleto.holder.email' => 'required|string',
            'charges.0.payment_method.boleto.holder.address.street' => 'required|string',
            'charges.0.payment_method.boleto.holder.address.number' => 'required|string',
            'charges.0.payment_method.boleto.holder.address.locality' => 'required|string',
            'charges.0.payment_method.boleto.holder.address.city' => 'required|string',
            'charges.0.payment_method.boleto.holder.address.region' => 'required|string',
            'charges.0.payment_method.boleto.holder.address.region_code' => 'required|string',
            'charges.0.payment_method.boleto.holder.address.country' => 'required|string',
            'charges.0.payment_method.boleto.holder.address.postal_code' => 'required|string',
            'notification_urls' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }


    /*
     * Validate data for create a qrcode order.
     *
     * @param array $data
     * @return void
     */
    public function validateCreditCardOrder($data)
    {
        $validator = Validator::make($data, [
            'reference_id' => 'required|string',
            'customer.name' => 'required|string',
            'customer.email' => 'required|string',
            'customer.tax_id' => 'required|string',
            'items.0.name' => 'required|string',
            'items.0.quantity' => 'required|integer',
            'items.0.unit_amount' => 'required|integer',
            'charges.0.amount.value' => 'required|integer',
            'charges.0.amount.currency' => 'required|string',
            'charges.0.payment_method.type' => 'required|string',
            'charges.0.payment_method.installments' => 'required|integer',
            'charges.0.payment_method.capture' => 'required|boolean',
            'charges.0.payment_method.card.number' => 'required|string',
            'charges.0.payment_method.card.store' => 'required|boolean',
            'charges.0.payment_method.card.exp_month' => 'required|string',
            'charges.0.payment_method.card.exp_year' => 'required|string',
            'charges.0.payment_method.card.security_code' => 'required|string',
            'charges.0.payment_method.card.holder.name' => 'required|string',
            'notification_urls' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }


    /*
     * Validate data for create a qrcode order.
     *
     * @param array $data
     * @return void
     */
    public function validateCreditCardTokenOrder($data)
    {
        $validator = Validator::make($data, [
            'reference_id' => 'required|string',
            'customer.name' => 'required|string',
            'customer.email' => 'required|string',
            'customer.tax_id' => 'required|string',
            'items.0.name' => 'required|string',
            'items.0.quantity' => 'required|integer',
            'items.0.unit_amount' => 'required|integer',
            'charges.0.amount.value' => 'required|integer',
            'charges.0.amount.currency' => 'required|string',
            'charges.0.payment_method.type' => 'required|string',
            'charges.0.payment_method.installments' => 'required|integer',
            'charges.0.payment_method.capture' => 'required|boolean',
            'charges.0.payment_method.card.id' => 'required|string',
            'notification_urls' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }
}
