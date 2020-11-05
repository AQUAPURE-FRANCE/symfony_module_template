<?php

namespace Sf_Aq_Indexes\Manager;

trait Sf_Aq_ManagerTrait
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
