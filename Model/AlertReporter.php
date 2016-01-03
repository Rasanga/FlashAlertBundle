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


class AlertReporter implements AlertReporterInterface
{
    /**
     * @var AlertManagerInterface
     */
    private $alertManager;


    /**
     * @param AlertManagerInterface $alertManager
     */
    public function __construct(AlertManagerInterface $alertManager)
    {
        $this->alertManager = $alertManager;
    }

    /**
     * @inheritdoc
     */
    public function addError($message)
    {
        $this->alertManager->addAlert(
            new Alert(AlertInterface::ERROR_ALERT, $message)
        );
    }

    /**
     * @inheritdoc
     */
    public function addSuccess($message)
    {
        $this->alertManager->addAlert(
            new Alert(AlertInterface::SUCCESS_ALERT, $message)
        );
    }

    /**
     * @inheritdoc
     */
    public function addInfo($message)
    {
        $this->alertManager->addAlert(
            new Alert(AlertInterface::INFO_ALERT, $message)
        );
    }

    /**
     * @inheritdoc
     */
    public function addWarning($message)
    {
        $this->alertManager->addAlert(
            new Alert(AlertInterface::WARNING_ALERT, $message)
        );
    }
} 