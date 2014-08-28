<?php
/**
 * AlertNotificationInterface.php
 * Definition of class AlertNotificationInterface
 *
 * Created 29/08/14 00:04
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\AlertNotificationsBundle\Model;


interface AlertNotificationInterface
{

    /**
     * @var string
     */
    const ERROR_ALERT     = "error";

    /**
     * @var string
     */
    const SUCCESS_ALERT   = "success";

    /**
     * @var string
     */
    const INFO_ALERT      = "info";

    /**
     * @var string
     */
    const BLOCK_ALERT     = "block";

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getMessage();

} 