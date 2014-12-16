<?php
/**
 * AlertPublisher.php
 * Definition of class AlertPublisher
 *
 * Created 31/08/14 07:19
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\FlashAlertBundle\Model;


use Symfony\Component\HttpFoundation\Session\Session;

class AlertPublisher
{
    /**
     * @var Session
     */
    private $session;


    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
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
    private function createAlertsForType($type, array $messages)
    {
        $alerts = array();

        foreach ($messages as $msg) {
            $alerts[] = new Alert($type, $msg);
        }

        return $alerts;
    }

} 