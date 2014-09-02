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

namespace Ras\Bundle\FlashAlertBundle\Service;


use Ras\Bundle\FlashAlertBundle\Model\Alert;
use Ras\Bundle\FlashAlertBundle\Model\AlertInterface;
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
     * Gets allowed alert types
     *
     * @return array
     */
    public static function getAlertTypes()
    {
        return array(
            AlertInterface::SUCCESS_ALERT,
            AlertInterface::ERROR_ALERT,
            AlertInterface::WARNING_ALERT,
            AlertInterface::INFO_ALERT
        );
    }

    /**
     * Gets alerts from session flash bag
     *
     * @return Alert[]
     */
    public function getAlerts()
    {
        $alerts = array();

        foreach (self::getAlertTypes() as $type) {
            $messages = $this->session->getFlashBag()->get($type);

            if (!empty($messages)) {
                $alerts = array_merge($alerts, $this->createAlertsForType($type, $messages)) ;
            }
        }

        return $alerts;
    }

    /**
     * Creates alert objects for a type
     *
     * @param string $type
     * @param array $messages
     * @return Alert[]
     */
    protected function createAlertsForType($type, array $messages)
    {
        $alerts = array();

        foreach ($messages as $msg) {
            $alerts[] = new Alert($type, $msg);
        }

        return $alerts;
    }

} 