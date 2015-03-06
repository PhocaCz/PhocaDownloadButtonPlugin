<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
jimport( 'joomla.plugin.plugin' );

class plgButtonPhocaDownload extends JPlugin
{
	
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	function onDisplay($name, $asset, $author) {
		
		$app = JFactory::getApplication();

		$document =  JFactory::getDocument();
		$template = $app->getTemplate();
		
		$enableFrontend = $this->params->get('enable_frontend', 0);
		
		if ($template != 'beez_20') {
			JHTML::stylesheet( 'plugins/editors-xtd/phocadownload/assets/css/phocadownload.css' );
		}
		
		$link = 'index.php?option=com_phocadownload&amp;view=phocadownloadlinks&amp;tmpl=component&amp;e_name='.$name;

		JHTML::_('behavior.modal');


		
		$button = new JObject;
		$button->modal = true;
		$button->class = 'btn';
		$button->link = $link;
		$button->text = JText::_('PLG_EDITORS-XTD_PHOCADOWNLOAD_FILE');
		$button->name = 'file';
		$button->options = "{handler: 'iframe', size: {x: 800, y: 500}}";
		
		if ($enableFrontend == 0) {
			if (!$app->isAdmin()) {
				$button = null;
			}
		}
	
		return $button;
	}
}