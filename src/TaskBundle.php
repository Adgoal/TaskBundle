<?php

declare(strict_types=1);

namespace AdgoalCommon\TaskBundle;

use AdgoalCommon\TaskBundle\DependencyInjection\RegisterEventListenerCompilerPass;
use AdgoalCommon\TaskBundle\DependencyInjection\TaskBundleExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class TaskBundle.
 *
 * @category AdgoalCommon\Task
 */
class TaskBundle extends Bundle
{
    public const TASK_EVENT_LISTENER_TAG_NAME = 'task.event_listener';

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(
            new RegisterEventListenerCompilerPass(
                'broadway.event_dispatcher',
                self::TASK_EVENT_LISTENER_TAG_NAME
            )
        );
    }

    /**
     * Return current bundle extension object.
     *
     * @return TaskBundleExtension
     */
    public function getContainerExtension(): TaskBundleExtension
    {
        return new TaskBundleExtension();
    }
}
