<?php
/**
 * AlertController.php
 * Definition of class AlertController
 *
 * Created 28/08/14 23:55
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\AlertNotificationBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlertController extends Controller
{

    public function displayAlertsAction()
    {
        return $this->render(
            'RasAlertNotificationBundle:Alert:alerts.html.twig',
            array(
                'alertNotifications'    => $this->getAlertPublishingService()->getAlerts()
            )
        );
    }

    /**
     * @return \Ras\Bundle\AlertNotificationBundle\Service\AlertPublishingService
     *
     */
    protected function getAlertPublishingService()
    {
        return $this->get("Ras.Alert.AlertPublishingService");
    }

} 