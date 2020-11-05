<?php

namespace SymfonyModule\Manager;

trait SymfonyModuleManagerTrait
{
    /**
     * @param string $serviceId
     * @return false|object|null
     */
    public function service(string $serviceId)
    {
        global $kernel;
        $kernel = new \AppKernel("prod", false);
        $kernel->boot();
        return $kernel->getContainer()->get($serviceId);
    }
}
