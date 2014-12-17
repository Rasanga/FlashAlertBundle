<?php
/**
 * AlertManager.php
 * Definition of class AlertManager
 *
 * Created 17/12/14 05:15
 *
 * @author Rasanga Perera <rasanga@byng-systems.com>
 * @copyright (c) 2014, Byng Systems/SkillsWeb Ltd
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
     * @var array
     */
    private $alerts = array();


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
        foreach (self::getAlertTypes() as $type) {
            $messages = $this->session->getFlashBag()->get($type);

            if (!empty($messages)) {
                $this->alerts = array_merge($this->alerts, $this->createAlertsForType($type, $messages)) ;
            }
        }

        return $this->alerts;
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