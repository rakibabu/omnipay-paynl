<?php

namespace Omnipay\Paynl\Message\Request;


use Omnipay\Paynl\Message\Response\FetchPaymentMethodsResponse;

/**
 * Class FetchPaymentMethodsRequest
 * @package Omnipay\Paynl\Message\Request
 *
 * @method FetchPaymentMethodsResponse send()
 */
class FetchPaymentMethodsRequest extends AbstractPaynlRequest
{
    public function getData()
    {
        $this->validate('tokenCode', 'apiToken', 'serviceId');

        return ['serviceId' => $this->getServiceId()];
    }

    public function sendData($data)
    {
        $responseData = $this->sendRequest('getServicePaymentOptions', $data);

        return $this->response = new FetchPaymentMethodsResponse($this, $responseData);
    }
}