<?php

use Doctrine\ORM\EntityManagerInterface;
use Chatbot\Entity\Chatbot;
use Chatbot\Repository\ChatbotRepository;

/**
 * Visit module on 'module/chatbotclient/chatbot'
 *
 * <ModuleName> => chatbot
 * <FileName> => chatbotclient.php
 * Format expected: <ModuleName><FileName>ModuleFrontController
 */
class ChatbotChatbotClientModuleFrontController extends ModuleFrontController
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

        /** @var ChatbotRepository $repository */
        $repository = $this->get('chatbot_repository'); // Or: $em->getRepository(Chatbot::class)

        $this->context->smarty->assign('var', $repository->findAll());
        $this->setTemplate('module:chatbot/views/templates/front/chatbot.tpl');
    }
}