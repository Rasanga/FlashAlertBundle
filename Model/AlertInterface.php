<?php
/**
 * AlertInterface.php
 * Definition of class AlertInterface
 *
 * Created 29/08/14 00:04
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\FlashAlertBundle\Model;


interface AlertInterface
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
    const BLOCK_ALERT     = "warning";

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getMessage();

} 