<?php

namespace SymfonyModule\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use SymfonyModule\Entity\SymfonyModule;
use SymfonyModule\Form\SymfonyModuleType;

class AdminSymfonyModuleController extends FrameworkBundleAdminController
{
    public function symfonyModuleIndex(Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        $object = new SymfonyModule();

        // Get repository service
        $symfonyModuleRepository = $this->get('symfonymodule.repository');

        $form = $this->createForm(SymfonyModuleType::class);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            $object->setDateAdd($form->getData()['dateAdd']);
            $em->persist($object);
            $em->flush();
            return $this->redirectToRoute('symfonymodule_admin');
        }

        return $this->render('@Modules/symfonymoduletemplate/templates/admin/index_symfonymodule.html.twig', [
            'dates' => $symfonyModuleRepository->findAll(),
            'form' => $form->createView()
        ]);
    }
}
