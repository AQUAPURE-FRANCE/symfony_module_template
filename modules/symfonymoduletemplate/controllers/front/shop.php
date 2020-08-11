<?php

use Doctrine\ORM\EntityManagerInterface;
use SymfonyModule\Entity\SymfonyModule;
use SymfonyModule\Repository\SymfonyModuleRepository;

/**
 * Visit module on 'module/symfonymoduletemplate/shop'
 *
 * <ModuleName> => symfonymoduletemplate
 * <FileName> => shop.php
 * Format expected: <ModuleName><FileName>ModuleFrontController
 */
class SymfonyModuleTemplateShopModuleFrontController extends ModuleFrontController
{
    /**
     * @see ModuleFrontControllerCore::__construct()
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see FrontController::init()
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        /** @var EntityManagerInterface $em */
        $em = $this->context->controller->getContainer()->get('doctrine.orm.entity_manager');

        /** @var SymfonyModuleRepository $repository */
        $repository = $this->get('symfonymodule_repository'); // Or: $em->getRepository(SymfonyModule::class)

        $this->context->smarty->assign('var', dump($repository->findAllCustomers()));
        $this->setTemplate('module:symfonymoduletemplate/views/templates/shop.tpl');
    }
}
