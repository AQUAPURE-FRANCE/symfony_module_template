<?php

namespace Chatbot\Controller\Admin;

use Configuration;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Chatbot\Entity\Chatbot;
use Chatbot\Form\ChatbotMailerType;
use Chatbot\Form\ChatbotSMTPType;
use Chatbot\Repository\ChatbotRepository;
use Chatbot\Service\SendMailService;

class AdminChatbotController extends FrameworkBundleAdminController
{
    /**
     * @param Request $req
     * @return RedirectResponse|Response|null
     */
    public function index(Request $req)
    {
        /** @var EntityManagerInterface $em */
        $em = $this->getDoctrine()->getManager();

        $object = new Chatbot();

        /** @var ChatbotRepository $sfModuleRepository */
        $sfModuleRepository = $this->get('chatbot_repository'); // Or: $sfModuleRepository = $em->getRepository(Chatbot::class);

        $formSMTP = $this->createform(ChatbotSMTPType::class);
        $formSMTP->handleRequest($req);

        if ($formSMTP->isSubmitted() && $formSMTP->isValid()) {
            Configuration::updateGlobalValue('SF_TEMPLATE_SMTP_HOST', $formSMTP->getData()['smtp_host']);
            Configuration::updateGlobalValue('SF_TEMPLATE_SMTP_PORT', $formSMTP->getData()['smtp_port']);
            Configuration::updateGlobalValue('SF_TEMPLATE_SMTP_USERNAME', $formSMTP->getData()['smtp_username']);
            Configuration::updateGlobalValue('SF_TEMPLATE_SMTP_PASSWORD', $formSMTP->getData()['smtp_password']);
            Configuration::updateGlobalValue('SF_TEMPLATE_EMAIL_FROM', $formSMTP->getData()['smtp_from']);
            return $this->redirectToRoute('chatbot_admin');
        }

        $formSendMail = $this->createform(ChatbotMailerType::class);
        $formSendMail->handleRequest($req);

        /** Send mail */
        if ($formSendMail->isSubmitted() && $formSendMail->isValid()) {
            (new SendMailService())->sendMail(
                $formSendMail->getData()['mailer_subject'],
                $formSendMail->getData()['mailer_to'],
                $this->renderView(
                    '@Modules/chatbot/views/templates/admin/mail_template.html.twig',
                    ['test' => $formSendMail->getData()['mailer_message']]
                ),
                null
            );
            $this->addFlash('succes', 'Mail sent to ' . $formSendMail->getData()['mailer_to']);

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('@Modules/chatbot/views/templates/admin/configure.html.twig', [
            'var' => dump($formSendMail->createView())
//            'formSMTP' => $formSMTP->createView(),
//            'formSendMail' => $formSendMail->createView()
        ]);
    }

    public function add(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $newDate = (new Chatbot())->setDateAdd(new DateTime($request->request->get('mydate')));
        $em->persist($newDate);
        $em->flush();

        return $this->json($newDate, 200, [], []);
    }
}