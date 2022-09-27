<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

use Joomla\CMS\Language\Text;
use Joomla\CMS\Object\CMSObject;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Session\Session;

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgButtonPhocaDownload extends CMSPlugin
{

    protected $autoloadLanguage = true;

	function onDisplay($name) {

		$app = JFactory::getApplication();

		$document =  JFactory::getDocument();
		$template = $app->getTemplate();

		$enableFrontend = $this->params->get('enable_frontend', 0);



		$link = 'index.php?option=com_phocadownload&amp;view=phocadownloadlinks&amp;tmpl=component&amp;layout=modal&amp;'
                . Session::getFormToken() . '=1&amp;editor='.$name;

		//Joomla\CMS\HTML\HTMLHelper::_('behavior.modal');

        $button = new CMSObject();
        $button->modal   = true;
        $button->link    = $link;
        $button->text    = Text::_('PLG_EDITORS-XTD_PHOCADOWNLOAD_FILE');
        $button->name    = $this->_type . '_' . $this->_name;
        $button->icon    = 'file';
        $button->iconSVG = '<svg viewBox="0 0 512 512" width="24" height="24"><path d="m48 2.45e-5h416a48 48 45 0 1 48 48v416a48 48 135 0 1-48 48h-416a48 48 45 0 1-48-48v-416a48 48 135 0 1 48-48zm179.22 83.188c21.374 0 40.805 5.7684 58.353 17.366 17.548 11.476 30.543 26.657 39.104 45.48 8.5616-2.7326 17.305-4.0683 26.171-4.0683 23.256 0 43.173 8.3795 59.628 25.138 16.455 16.82 24.713 36.858 24.713 60.235 0 23.378-8.258 43.416-24.713 60.175-16.455 16.82-36.372 25.199-59.628 25.199h-37.222v-72.744c0-4.0682-1.3966-7.4686-4.1897-10.262-2.854-2.854-6.315-4.2505-10.383-4.2505h-87.256c-4.0683 0-7.4688 1.3959-10.323 4.2505-2.7931 2.7932-4.1898 6.1936-4.1898 10.262v72.744h-64.607c-15.545 0-28.66-5.5863-39.529-16.698-10.93-11.173-16.334-24.41-16.334-39.711 0-13.419 4.1898-25.26 12.509-35.704 8.3188-10.323 18.823-16.82 31.454-19.613-0.42554-3.6432-0.60741-7.2258-0.60741-10.748 0-19.37 4.7969-37.344 14.269-53.799 9.4725-16.456 22.527-29.51 38.983-38.983 16.455-9.4726 34.429-14.269 53.799-14.269zm6.3758 171.35h43.658c1.9431 0 3.6433 0.66838 5.0398 2.1252 1.4573 1.4565 2.2467 3.2182 2.2467 5.1613v79.97h39.833c4.0682 0 6.5579 1.0927 7.5901 3.3396 0.97115 2.2467 0.18188 4.9185-2.3682 8.0151l-64.85 70.983c-2.4896 3.0968-5.647 4.6755-9.2903 4.6755-3.704 0-6.8008-1.5787-9.3511-4.6755l-64.85-70.983c-2.4895-3.0966-3.3396-5.7684-2.3073-8.0151 0.97115-2.2467 3.461-3.3396 7.5294-3.3396h39.894v-79.97c0-1.9431 0.72866-3.704 2.186-5.1613 1.4573-1.4565 3.1575-2.1252 5.0398-2.1252" fill="#2e9930" fill-rule="evenodd"/></svg>';

        $button->options = [
        'height' => '300px',
        'width'  => '800px',
        'bodyHeight'  => '70',
        'modalWidth'  => '80',
        ];

        if ($enableFrontend == 0) {
			if (!$app->isClient('administrator')) {
				$button = null;
			}
		}

		return $button;
	}
}
