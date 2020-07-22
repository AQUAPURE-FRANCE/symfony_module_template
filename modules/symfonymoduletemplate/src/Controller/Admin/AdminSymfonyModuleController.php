<?php

namespace SymfonyModule\Controller\Admin;

use Configuration;
use Doctrine\ORM\EntityManagerInterface;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SymfonyModule\Entity\SymfonyModule;
use SymfonyModule\Form\SymfonyModuleMailerType;
use SymfonyModule\Form\SymfonyModuleSMTPType;
use SymfonyModule\Repository\SymfonyModuleRepository;
use SymfonyModule\Service\SendMailService;

class AdminSymfonyModuleController extends FrameworkBundleAdminController
{
    /**
     * @param Request $req
     * @return RedirectResponse|Response|null
     */
    public function index(Request $req)
    {
        /** @var EntityManagerInterface $em */
        $em = $this->getDoctrine()->getManager();

        $object = new SymfonyModule();

        /** @var SymfonyModuleRepository $symfonyModuleRepository */
        $sfModuleRepository = $em->getRepository(SymfonyModule::class); // Or: $this->get('symfonymodule.repository');

        $formSMTP = $this->createform(SymfonyModuleSMTPType::class);
        $formSMTP->handleRequest($req);

        if ($formSMTP->isSubmitted() && $formSMTP->isValid()) {
            Configuration::updateGlobalValue('SF_TEMPLATE_SMTP_HOST', $formSMTP->getData()['smtp_host']);
            Configuration::updateGlobalValue('SF_TEMPLATE_SMTP_PORT', $formSMTP->getData()['smtp_port']);
            Configuration::updateGlobalValue('SF_TEMPLATE_SMTP_USERNAME', $formSMTP->getData()['smtp_username']);
            Configuration::updateGlobalValue('SF_TEMPLATE_SMTP_PASSWORD', $formSMTP->getData()['smtp_password']);
            Configuration::updateGlobalValue('SF_TEMPLATE_EMAIL_FROM', $formSMTP->getData()['smtp_from']);
            return $this->redirectToRoute('symfonymodule_admin');
        }

        $formSendMail = $this->createform(SymfonyModuleMailerType::class);
        $formSendMail->handleRequest($req);

        /** Send mail */
        if ($formSendMail->isSubmitted() && $formSendMail->isValid()) {
            (new SendMailService())->sendMail(
                $formSendMail->getData()['mailer_subject'],
                $formSendMail->getData()['mailer_to'],
                $this->renderView(
                    '@Modules/symfonymoduletemplate/templates/admin/mail_template.html.twig',
                    ['test' => $formSendMail->getData()['mailer_message']]
                ),
                null
            );
            $this->addFlash('succes', 'Mail sent to ' . $formSendMail->getData()['mailer_to']);

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('@Modules/symfonymoduletemplate/templates/admin/index_symfonymodule.html.twig', [
            'formSMTP' => $formSMTP->createView(),
            'formSendMail' => $formSendMail->createView()
        ]);
    }
}
