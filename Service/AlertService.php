<?php
/**
 * AlertService.php
 * Definition of class AlertService
 *
 * Created 28/08/14 23:58
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\AlertNotificationsBundle\Service;


use Ras\Bundle\AlertNotificationsBundle\Model\AlertNotification;
use Ras\Bundle\AlertNotificationsBundle\Model\AlertNotificationInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class AlertService
{

    /**
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    protected $session;

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Gets allowed alert notification types
     *
     * @return array
     */
    public static function getAlertTypes()
    {
        return array(
            AlertNotificationInterface::ERROR_ALERT,
            AlertNotificationInterface::SUCCESS_ALERT,
            AlertNotificationInterface::INFO_ALERT,
            AlertNotificationInterface::BLOCK_ALERT
        );
    }

    /**
     * Gets alert notification from session flash bag
     *
     * @return AlertNotification[]
     */
    public function getAlerts()
    {
        $alerts = [];

        foreach (self::getAlertTypes() as $type) {
            $messages = $this->session->getFlashBag()->get($type);

            if (!empty($messages)) {
                $alerts += $this->createAlertsForType($type, $messages);
            }
        }

        return $alerts;
    }

    /**
     * Creates alert messages objects for a type
     *
     * @param string $type
     * @param array $messages
     * @return AlertNotification[]
     */
    protected function createAlertsForType($type, array $messages)
    {
        $alerts = [];

        foreach ($messages as $msg) {
            $alerts[] = new AlertNotification($type, $msg);
        }

        return $alerts;
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