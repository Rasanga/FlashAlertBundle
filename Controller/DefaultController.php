<?php

namespace Ras\Bundle\AlertNotificationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RasAlertNotificationsBundle:Default:index.html.twig', array('name' => $name));
    }
}
