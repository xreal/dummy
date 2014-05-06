<?php namespace Omnipay\Targobank\Message;
/**
 * CompletePurchaseRequest.php
 *
 * @category    omnipay:targobank
 * @package     ${NAMESPACE}
 * @copyright   Softcom GmbH
 * @author      Thorsten Naumann <naumann@shanet.de>
 * @since       06.05.14 14:26
 */
class CompletePurchaseRequest extends PurchaseRequest {
    public function getData()
    {
        return $this->httpRequest->request->all();
    }

    public function setData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }


}