<?php
/**
 * PurchaseResponse.php
 *
 * @category    omnipay:targobank
 * @package     Omnipay\Dummy\Message
 * @copyright   Softcom GmbH
 * @author      Thorsten Naumann <naumann@shanet.de>
 * @since       06.05.14 14:33
 */

namespace Omnipay\Targobank\Message;


use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface {

    protected $redirectUrl;

    public function __construct(RequestInterface $request, $data, $redirectUrl)
    {
        parent::__construct($request, $data);
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * Gets the redirect target url.
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * Get the required redirect method (either GET or POST).
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     */
    public function getRedirectData()
    {
        return $this->getData();
    }

    /**
     * Is the response successful?
     * @return bool
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * Is the response a redirect?
     * @return bool
     */
    public function isRedirect()
    {
        return true;
    }

    public function isPopup()
    {
        return true;
    }

} 