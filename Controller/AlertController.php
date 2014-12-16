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

namespace Ras\Bundle\FlashAlertBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlertController extends Controller
{

    public function displayAlertsAction($isAddStyles = true)
    {
        return $this->render(
            'RasFlashAlertBundle::flashAlerts.html.twig',
            array(
                'flashAlerts'   =>  $this->getAlertPublishingService()->getAlerts(),
                'isAddStyles'     =>  $isAddStyles
            )
        );
    }

    /**
     * @return \Ras\Bundle\FlashAlertBundle\Model\AlertPublisher
     *
     */
    protected function getAlertPublishingService()
    {
        return $this->get('ras_flash_alert.alert_publisher');
    }

} 