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

namespace Ras\Bundle\FlashAlertBundle\Service;


use Ras\Bundle\FlashAlertBundle\Model\Alert;
use Ras\Bundle\FlashAlertBundle\Model\AlertInterface;
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
     * @param AlertInterface $alert
     */
    protected function addAlert(AlertInterface $alert)
    {
        $this->session->getFlashBag()->add($alert->getType(), $alert->getMessage());
    }

    /**
     * Adds error alert notification to session flash bag
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
     * Adds success alert notification to session flash bag
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
     * Adds information alert notification to session flash bag
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
     * Adds warning (block) alert notification to session flash bag
     *
     * @param string $message
     */
    public function addWarning($message)
    {
        $this->addAlert(
            new Alert(AlertInterface::BLOCK_ALERT, $message)
        );
    }

} 