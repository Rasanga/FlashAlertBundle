<?php
/**
 * FlashAlertsExtension.php
 * Definition of class FlashAlertsExtension
 *
 * Created 16/12/14 19:24
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * @copyright (c) 2014, Byng Systems/SkillsWeb Ltd
 */

namespace Ras\Bundle\FlashAlertBundle\Twig;


use Symfony\Component\DependencyInjection\ContainerInterface;

class FlashAlertsExtension extends \Twig_Extension
{
    /**
     * @var ContainerInterface
     */
    private $container;

//    /**
//     * @var \Ras\Bundle\FlashAlertBundle\Model\AlertPublisher
//     */
//    private $alertPublisher;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
//        $this->alertPublisher = $container->get('ras_flash_alert.alert_publisher');
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'ras_flash_alert_extension';
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return array(
            'render_flash_alerts' => new \Twig_Function_Method($this, 'renderFlashAlerts', array(
                'is_safe'   =>  array('html')
            ))
        );
    }

    /**
     * Renders the breadcrumbs in a list
     *
     * @param  array  $options
     * @return string
     */
    public function renderFlashAlerts(array $options = array())
    {
        return $this->container->get('ras_flash_alert.templating.alert_reporter_helper')
            ->flashAlerts($options);
    }
}