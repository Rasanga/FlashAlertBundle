<?php
/**
 * AlertReporter.php
 * Definition of class AlertReporter
 *
 * Created 28/08/14 23:58
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\FlashAlertBundle\Model;


use Symfony\Component\HttpFoundation\Session\Session;

class AlertReporter
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
     * Adds error alert to session flash bag
     *
     * @param string $message
     */
    public function addError($message)
    {
        $this->addAlert(
            new Alert(AlertInterface::ERROR_ALERT, $message)
        );
    }

    /**
     * Adds success alert to session flash bag
     *
     * @param string $message
     */
    public function addSuccess($message)
    {
        $this->addAlert(
            new Alert(AlertInterface::SUCCESS_ALERT, $message)
        );
    }

    /**
     * Adds information alert to session flash bag
     *
     * @param string $message
     */
    public function addInfo($message)
    {
        $this->addAlert(
            new Alert(AlertInterface::INFO_ALERT, $message)
        );
    }

    /**
     * Adds warning (block) alert to session flash bag
     *
     * @param string $message
     */
    public function addWarning($message)
    {
        $this->addAlert(
            new Alert(AlertInterface::WARNING_ALERT, $message)
        );
    }

    /**
     * Adds alert to session flash bag
     *
     * @param AlertInterface $alert
     */
    private function addAlert(AlertInterface $alert)
    {
        $this->session->getFlashBag()->add($alert->getType(), $alert->getMessage());
    }
} 