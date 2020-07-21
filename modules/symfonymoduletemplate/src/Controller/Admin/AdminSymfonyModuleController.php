<?php

namespace SymfonyModule\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use SymfonyModule\Entity\SymfonyModule;
use SymfonyModule\Form\SymfonyModuleType;
use SymfonyModule\Repository\SymfonyModuleRepository;

class AdminSymfonyModuleController extends FrameworkBundleAdminController
{
    public function symfonyModuleIndex(Request $req)
    {
        /** @var EntityManagerInterface $em */
        $em = $this->getDoctrine()->getManager();
        $object = new SymfonyModule();

        /** @var SymfonyModuleRepository $symfonyModuleRepository */
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
