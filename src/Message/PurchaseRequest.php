<?php
/**
 * PurchaseRequest.php
 *
 * @category    omnipay:targobank
 * @package     Omnipay\Dummy\Message
 * @copyright   Softcom GmbH
 * @author      Thorsten Naumann <naumann@shanet.de>
 * @since       06.05.14 14:30
 */

namespace Omnipay\Targobank\Message;


use Omnipay\Common\Message\AbstractRequest;

class PurchaseRequest extends AbstractRequest{

    protected $liveEndpoint = 'https://onlineapplication.targobank.de/app/koop_start.asp';
    protected $testEndpoint = 'https://onlineapplication.uat.targobank.de/app/koop_start.asp';

    public function getDealerId()
    {
        return $this->getParameter('dealerID');
    }

    public function setDealerId($value)
    {
        return $this->setParameter('dealerID', $value);
    }

    public function getDealerText()
    {
        return $this->getParameter('dealerText');
    }

    public function setDealerText($value)
    {
        return $this->setParameter('dealerText', $value);
    }

    public function getKoopId()
    {
        return $this->getParameter('koop_ID');
    }

    public function setKoopId($value)
    {
        return $this->setParameter('koop_ID', $value);
    }

    public function getSessionId()
    {
        return $this->getParameter('sessionID');
    }

    public function setSessionId($value)
    {
        return $this->setParameter('sessionID', $value);
    }

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     * @return mixed
     */
    public function getData()
    {
        $data = array();
        $data['dealerID'] = $this->getDealerId();
        $data['dealerText'] = $this->getDealerText();
        $data['koop_ID'] = $this->getKoopId();
        $data['sessionID'] = $this->getSessionId();
        if ($this->getCard())
        {
            $data['surname'] = $this->getCard()->getLastName();
            $data['firstname'] = $this->getCard()->getFirstName();
            $data['street'] = $this->getCard()->getBillingAddress1();
            $data['streetnumber'] = '';
            $data['zip'] = $this->getCard()->getBillingPostcode();
            $data['city'] = $this->getCard()->getBillingCity();
        }
        $data['amount'] = $this->getAmount();

        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     *
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data, $this->getDealerText() );
    }

    /**
     * Get the Endpoint URL
     * @return string
     */
    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }


} 