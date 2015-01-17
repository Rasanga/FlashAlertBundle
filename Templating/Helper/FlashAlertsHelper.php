<?php
/**
 * FlashAlertsHelper.php
 * Definition of class FlashAlertsHelper
 *
 * Created 16/12/14 18:50
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * @copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\FlashAlertBundle\Templating\Helper;


use Ras\Bundle\FlashAlertBundle\Model\AlertPublisher;
use Symfony\Component\Console\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;

class FlashAlertsHelper extends Helper
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var AlertPublisher
     */
    private $alertPublisher;

    /**
     * @var array
     */
    private $options = array();

    /**
     * @param \Symfony\Component\Templating\EngineInterface $templating
     * @param \Ras\Bundle\FlashAlertBundle\Model\AlertPublisher $alertPublisher
     * @param array $options
     */
    public function __construct(EngineInterface $templating, AlertPublisher $alertPublisher, array $options)
    {
        $this->templating  = $templating;
        $this->alertPublisher = $alertPublisher;
        $this->options = $options;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'ras_flash_alert_helper';
    }

    /**
     * Returns the HTML for the flashAlerts
     *
     * @param array $options
     * @return string A HTML string
     */
    public function renderFlashAlerts(array $options = array())
    {
        $options = $this->resolveOptions($options);

        return $this->templating->render(
            $options['template'],
            $options
        );
    }

    /**
     * Merges user-supplied options from the view
     * with base config values
     *
     * @param array $options
     * @return array
     */
    private function resolveOptions(array $options = array())
    {
        $this->options['alertPublisher'] = $this->alertPublisher;

        return array_merge($this->options, $options);
    }
}