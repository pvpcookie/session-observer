<?php

namespace Dotdigitalgroup\SessionLogger\Plugin;

use Closure;
use Magento\Customer\Model\Visitor;
use Magento\Customer\Model\Session;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Http\Context;
use Magento\Framework\App\RequestInterface;
use Dotdigitalgroup\SessionLogger\Model\SessionManager;
use Psr\Log\LoggerInterface;

class VisitorSessionContext
{
    /**
     * @var Visitor
     */
    protected $visitorSession;

    /**
     * @var Context
     */
    protected $httpContext;

    /*
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var SessionManager
     */
    private SessionManager $session;

    /**
     * @var Session
     */
    private Session $customerSession;

    /**
     * @param SessionManager $session
     * @param Visitor $visitorSession
     * @param Context $httpContext
     * @param LoggerInterface $logger
     */
    public function __construct(
        SessionManager $session,
        Session $customerSession,
        Visitor $visitorSession,
        Context $httpContext,
        LoggerInterface $logger,

    ) {
        $this->session = $session;
        $this->visitorSession = $visitorSession;
        $this->customerSession = $customerSession;
        $this->httpContext = $httpContext;
        $this->logger = $logger;
    }

    /**
     * @param ActionInterface $subject
     * @param callable $proceed
     * @param RequestInterface $request
     * @return mixed
     */
    public function aroundDispatch(
        ActionInterface $subject,
        Closure $proceed,
        RequestInterface $request
    ) {


        $this->logger->info('SessionContext',[
            "php_session" => $_SESSION,
            "visitor_session" => $this->visitorSession->getData(),
            "customer_session" => $this->customerSession->getData(),
        ]);

        return $proceed($request);
    }
}
