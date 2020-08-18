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

use Twig\Environment;

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once _PS_ROOT_DIR_.'/app/AppKernel.php';

/**
 * Docs on https://blog.floriancourgey.com/2018/05/how-to-work-with-the-symfony-kernel-anywhere-in-prestashop-1-7/
 */
class SymfonyModuleTemplate extends Module
{
    /** @var Environment */
    private $twig;

    /** @var AppKernel */
    private $kernel;

    public function __construct()
    {
        $this->name = 'symfonymoduletemplate';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'development.app.tester@gmail.com';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Symfony Module Template');
        $this->description = $this->l('This is a symfony template for Ps');
        $this->confirmUninstall = $this->l('');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        
        global $kernel;
        $this->kernel = $kernel;
        $this->twig = $kernel->getContainer()->get('twig');
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('SYMFONYMODULETEMPLATE_LIVE_MODE', false);
        include(dirname(__FILE__).'/sql/install.php');
        return parent::install() &&
            $this->installTab();
    }

    public function uninstall()
    {
        Configuration::deleteByName('SYMFONYMODULETEMPLATE_LIVE_MODE');
        include(dirname(__FILE__).'/sql/uninstall.php');
        return parent::uninstall();
    }

    private function installTab()
    {
        $tabId = (int) Tab::getIdFromClassName('AdminSymfonyModuleController');
        if (!$tabId) {
            $tabId = null;
        }

        $tab = new Tab($tabId);
        $tab->active = 1;
        $tab->class_name = 'AdminSymfonyModuleController';
        $tab->id_parent = (int) Tab::getIdFromClassName('AdminParentModulesSf');
        $tab->position = Tab::getNewLastPosition($tab->id_parent);
        foreach (Language::getLanguages(false) as $lang) {
            $tab->name[(int)$lang['id_lang']] = 'Symfony Module Template';
        }
        $tab->module = $this->name;
        return $tab->add();
    }

    private function uninstallSymfonyModuleTab()
    {
        $tabId = (int) Tab::getIdFromClassName('AdminSymfonyModuleController');
        if (!$tabId) {
            return true;
        }
        $tab = new Tab($tabId);
        return $tab->delete();
    }
}
