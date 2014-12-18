<?php

namespace Ras\Bundle\FlashAlertBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Default alert view template
     */
    const DEFAULT_TEMPLATE = 'RasFlashAlertBundle::layout.html.twig';

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ras_flash_alert');

        $rootNode
            ->children()
                ->scalarNode('template')
                    ->defaultValue(self::DEFAULT_TEMPLATE)
                    ->end()

                ->booleanNode('isAddStyles')
                    ->defaultTrue()
                    ->end()

                ->booleanNode('isAddJsAlertClose')
                    ->defaultTrue()
                    ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
