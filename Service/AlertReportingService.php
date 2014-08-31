<?php
/**
 * AlertReportingService.php
 * Definition of class AlertReportingService
 *
 * Created 28/08/14 23:58
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\AlertNotificationBundle\Service;


use Ras\Bundle\AlertNotificationBundle\Model\AlertNotification;
use Ras\Bundle\AlertNotificationBundle\Model\AlertNotificationInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class AlertReportingService extends AbstractAlertService
{

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        parent::__construct($session);
    }

    /**
     * Adds alert notification to session flash bag
     *
     * @param AlertNotificationInterface $alert
     */
    protected function addAlertNotification(AlertNotificationInterface $alert)
    {
        $this->session->getFlashBag()->add($alert->getType(), $alert->getMessage());
    }

    /**
     * Adds error alert notification to session flash bag
     *
     * @param string $message
     */
    public function addErrorAlert($message)
    {
        $this->addAlertNotification(
            new AlertNotification(AlertNotificationInterface::ERROR_ALERT, $message)
        );
    }

    /**
     * Adds success alert notification to session flash bag
     *
     * @param string $message
     */
    public function addSuccessAlert($message)
    {
        $this->addAlertNotification(
            new AlertNotification(AlertNotificationInterface::SUCCESS_ALERT, $message)
        );
    }

    /**
     * Adds information alert notification to session flash bag
     *
     * @param string $message
     */
    public function addInfoAlert($message)
    {
        $this->addAlertNotification(
            new AlertNotification(AlertNotificationInterface::INFO_ALERT, $message)
        );
    }

    /**
     * Adds block (warning) alert notification to session flash bag
     *
     * @param string $message
     */
    public function addBlockAlert($message)
    {
        $this->addAlertNotification(
            new AlertNotification(AlertNotificationInterface::BLOCK_ALERT, $message)
        );
    }

} 