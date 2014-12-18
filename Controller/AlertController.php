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
    /**
     * @deprecated
     *
     * @param bool $isAddStyles
     * @param bool $isAddJsAlertClose
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function displayAlertsAction($isAddStyles = true, $isAddJsAlertClose = true)
    {
        return $this->render(
            'RasFlashAlertBundle::layout.html.twig',
            array(
                'alertPublisher'        =>  $this->getAlertPublisher(),
                'isAddStyles'           =>  $isAddStyles,
                'isAddJsAlertClose'     =>  $isAddJsAlertClose
            )
        );
    }

    /**
     * @return \Ras\Bundle\FlashAlertBundle\Model\AlertPublisher
     *
     */
    private function getAlertPublisher()
    {
        return $this->get('ras_flash_alert.alert_publisher');
    }
}