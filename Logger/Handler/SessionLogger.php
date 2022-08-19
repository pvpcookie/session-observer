<?php
/**
 * @author Shaun Hogan
 * @package Learning/CronLogger
 */
namespace Dotdigitalgroup\SessionLogger\Logger\Handler;

use Magento\Framework\Logger\Handler\Base as BaseHandler;
use Monolog\Logger as MonologLogger;

/**
 * @class SessionLogger
 */
class SessionLogger extends BaseHandler
{
    /**
     * Logging level
     *
     * @var int
     */
    protected $loggerType = MonologLogger::DEBUG;

    /**
     * File name
     *
     * @var string
     */
    protected $fileName = '/var/log/session.log';


}
