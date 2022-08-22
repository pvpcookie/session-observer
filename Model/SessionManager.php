<?php

namespace Dotdigitalgroup\SessionLogger\Model;

use Magento\Framework\Session\SessionManager as CoreSessionManager;

class SessionManager extends CoreSessionManager
{

    public function setSessionCustomValue($key, $value)
    {
        $this->storage->setData($key, $value);
    }

}
