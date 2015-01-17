<?php
/**
 * AlertManagerInterface.php
 * Definition of class AlertManagerInterface
 *
 * Created 17/12/14 05:33
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * @copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\FlashAlertBundle\Model;


interface AlertManagerInterface
{
    /**
     * Adds alert to session flash bag
     *
     * @param AlertInterface $alert
     */
    public function addAlert(AlertInterface $alert);

    /**
     * Gets alerts from session flash bag
     *
     * @return Alert[]
     */
    public function getAlerts();
}