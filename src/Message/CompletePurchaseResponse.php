<?php namespace Omnipay\Targobank\Message;

/**
 * CompletePurchaseResponse.php
 *
 * @category    omnipay:targobank
 * @package     Omnipay\Targobank\Message
 * @copyright   Softcom GmbH
 * @author      Thorsten Naumann <naumann@shanet.de>
 * @since       06.05.14 15:42
 */

class CompletePurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['session_id']) && ($this->data['paid'] > 0);
    }

    public function getTransactionReference()
    {
        return isset($this->data['session_id']) ? $this->data['session_id'] : null;
    }

    public function getMessage()
    {
        return null;
    }
} 