<?php

declare(strict_types=1);

namespace AdgoalCommon\TaskBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 *
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 *
 * @category AdgoalCommon\Saga
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     *
     * @psalm-suppress PossiblyUndefinedMethod
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('adgoal_task');
        $treeBuilder->getRootNode()
            ->children()
                ->booleanNode('send_job_status_event')->info('Set boolean flag is needed to send job status event to queue, default true')->defaultTrue()->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
