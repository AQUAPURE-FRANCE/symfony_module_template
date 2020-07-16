<?php

namespace SymfonyModule\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use SymfonyModule\Form\SymfonyModuleType;

class AdminSymfonyModuleController extends FrameworkBundleAdminController
{
    /**
     * Fonction privée qui récupère toutes les données à partir du tableau 'symfonyModule_search'
     */
    private function getReq(Request $req)
    {
        return $req->query->all()['symfonyModule_search'];
    }

    public function symfonyModuleIndex(Request $req)
    {
        $symfonyModuleRepository = $this->get('symfonyModule_repository');
        $symfonyModuleForm = $this->createForm(SymfonyModuleType::class);
        $symfonyModuleForm->handleRequest($req);

        if ($symfonyModuleForm->isSubmitted() && $symfonyModuleForm->isValid()) {
           dump($symfonyModuleForm->getData());die;
        }

        return $this->render('@Modules/symfonyModule/templates/admin/index_symfonymodule.html.twig', [
            'allDates' => $symfonyModuleRepository->findall(),
            'symfonyModuleFilterForm' => $symfonyModuleForm->createView()
        ]);
    }
}
