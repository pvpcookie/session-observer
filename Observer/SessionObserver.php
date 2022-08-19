<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Dotdigitalgroup\SessionLogger\Observer;

use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Laminas\Session\SessionManager;
use Magento\Framework\Session\SessionManager as MagentoSessionManager;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\Visitor;
use \Magento\Framework\Session\SessionManagerInterface;

class SessionObserver implements ObserverInterface
{

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var SessionManagerInterface
     */
    private SessionManagerInterface $_coreSession;

    /**
     * @var SessionManager
     */
    private SessionManager $_sessionManager;

    public function __construct(
        LoggerInterface $logger,
        SessionManagerInterface $coreSession,
        SessionManager $sessionManager,
        MagentoSessionManager $magentoSessionManager
    )
    {
        $this->logger = $logger;
        $this->_coreSession = $coreSession;
        $this->_sessionManager = $sessionManager;
        $this->_magentoSessionManager = $magentoSessionManager;
    }

    public function execute(Observer $observer)
    {
        $this->logger->info('SessionObserver');
        var_dump($this->_coreSession->getSessionId());
        var_dump($this->_sessionManager->isValid());
        var_dump(get_class_methods($this->_magentoSessionManager));

    }
}
