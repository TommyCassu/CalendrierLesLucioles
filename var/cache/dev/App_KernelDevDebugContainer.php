<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOVf5wlM\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOVf5wlM/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerOVf5wlM.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerOVf5wlM\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerOVf5wlM\App_KernelDevDebugContainer([
    'container.build_hash' => 'OVf5wlM',
    'container.build_id' => 'b5936c6b',
    'container.build_time' => 1641974148,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerOVf5wlM');
