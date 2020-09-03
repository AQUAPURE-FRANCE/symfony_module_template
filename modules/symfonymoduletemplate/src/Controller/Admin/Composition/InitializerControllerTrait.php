<?php

namespace SymfonyModule\Controller\Admin\Composition;

use Doctrine\ORM\EntityManagerInterface;
use Sf_Aq_Indexes\Repository\Sf_Aq_IndexesRepository;
use Sf_Aq_Indexes\Repository\Sf_Aq_ProductRepository;
use Symfony\Component\Serializer\Serializer;

trait InitializerControllerTrait
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var SymfonyModuleRepository */
    private $sfModuleRepository;

    /** @var \AppKernel */
    protected $kernel;

    public function __construct()
    {
        global $kernel;
        $this->kernel = $kernel;
        $this->entityManager = $this->kernel->getContainer()->get('doctrine.orm.default_entity_manager');
        $this->sfModuleRepository = $this->kernel->getContainer()->get('symfonymodule_repository');
    }
}
