<?php


use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;

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
     * @var EntityManagerInterface $manager
     */
    private $manager;

    /**
     * @var Environment $twig
     */
    private $twig;

    /**
     * @see ModuleFrontController::__construct()
     */
    public function __construct()
    {
        parent::__construct();

        $this->kernel = SymfonyModuleTemplate::getKernel();
        $this->manager = $this->kernel->getContainer()->get('doctrine');
        $this->twig = SymfonyModuleTemplate::getService('twig');
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
        //parent::initContent();


        $var = $this->twig->load('@Modules/symfonymoduletemplate/templates/shop.html.twig', [
            'test' => 'it works!'
        ]);

        return dump($var);
//        $this->context->smarty->assign('test', dump($this->context));
//        $this->setTemplate('module:symfonymoduletemplate/templates/shop.tpl');
    }
}