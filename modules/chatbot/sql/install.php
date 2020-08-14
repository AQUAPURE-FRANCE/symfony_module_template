<?php
/**
* 2007-2020 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2020 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'chat` (
    `id_chat` int(11) NOT NULL AUTO_INCREMENT,
    `id_chat_user` int(11) NOT NULL,
    `id_chat_employee` int(11) NULL,
    `id_chat_message` int(11) NOT NULL,
    `is_user_sender` boolean NOT NULL,
    `has_response` boolean NOT NULL DEFAULT false,
    `created_at` datetime NOT NULL,
    PRIMARY KEY  (`id_chat`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'chat_message` (
    `id_chat_message` int(11) NOT NULL AUTO_INCREMENT,
    `text` text NOT NULL,
    `id_chat_subject` int(11) NULL,
    PRIMARY KEY  (`id_chat_message`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';



$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'chat_subject` (
    `id_chat_subject` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(225) NOT NULL,
    PRIMARY KEY  (`id_chat_subject`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'chat_employee` (
    `id_chat_employee` int(11) NOT NULL AUTO_INCREMENT,
    `id_employee` int(11) NOT NULL,
    `id_chat_avatar` int(11) NOT NULL,
    PRIMARY KEY  (`id_chat_employee`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'chat_avatar` (
    `id_chat_avatar` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(225) NOT NULL DEFAULT "default.png",
    `is_default` boolean NOT NULL DEFAULT true,
    PRIMARY KEY  (`id_chat_avatar`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'chat_user` (
    `id_chat_user` int(11) NOT NULL AUTO_INCREMENT,
    `id_guest` int(11) NOT NULL DEFAULT true,
    `id_customer` int(11) NULL,
    `id_chat_avatar` int(11) NULL,
    `firstname` varchar(225),
    `lastname` varchar(225),
    `email` varchar(225),
    PRIMARY KEY  (`id_chat_user`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'chat_to_faq` (
    `id_chat_to_faq` int(11) NOT NULL AUTO_INCREMENT,
    `id_chat` int(11) NOT NULL,
    `is_relevant` boolean NOT NULL DEFAULT false,
    PRIMARY KEY  (`id_chat_to_faq`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'chat_blacklist` (
    `id_chat_blacklist` int(11) NOT NULL AUTO_INCREMENT,
    `text` text,
    PRIMARY KEY  (`id_chat_blacklist`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
