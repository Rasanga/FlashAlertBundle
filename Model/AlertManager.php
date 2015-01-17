<?php
/**
 * AlertManager.php
 * Definition of class AlertManager
 *
 * Created 17/12/14 05:15
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * @copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\FlashAlertBundle\Model;


use Symfony\Component\HttpFoundation\Session\Session;

class AlertManager implements AlertManagerInterface
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
     * @inheritdoc
     */
    public function addAlert(AlertInterface $alert)
    {
        $this->session->getFlashBag()->add($alert->getType(), $alert->getMessage());
    }

    /**
     * @inheritdoc
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

    /**
     * Gets allowed alert types
     *
     * @return array
     */
    private static function getAlertTypes()
    {
        return array(
            AlertInterface::SUCCESS_ALERT,
            AlertInterface::ERROR_ALERT,
            AlertInterface::WARNING_ALERT,
            AlertInterface::INFO_ALERT
        );
    }
}