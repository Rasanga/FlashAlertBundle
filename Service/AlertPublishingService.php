<?php
/**
 * AlertPublishingService.php
 * Definition of class AlertPublishingService
 *
 * Created 31/08/14 07:19
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\AlertNotificationBundle\Service;


use Ras\Bundle\AlertNotificationBundle\Model\AlertNotification;
use Ras\Bundle\AlertNotificationBundle\Model\AlertNotificationInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class AlertPublishingService extends AbstractAlertService
{

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        parent::__construct($session);
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
        $alerts = array();

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
        $alerts = array();

        foreach ($messages as $msg) {
            $alerts[] = new AlertNotification($type, $msg);
        }

        return $alerts;
    }

} 