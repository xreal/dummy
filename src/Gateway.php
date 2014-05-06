<?php namespace Omnipay\Targobank;

use Omnipay\Common\AbstractGateway;

/**
 * Class Gateway
 * @package Omnipay\Targobank
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Targobank';
    }

    public function getDefaultParameters()
    {
        return array(
            'dealerID' => '',
            'dealerText' => '',
            'koop_ID' => ''
        );
    }
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


    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Targobank\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Targobank\Message\CompletePurchaseRequest', $parameters);
    }

}
