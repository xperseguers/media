<?php
namespace TYPO3\CMS\Media\ViewHelpers\Component;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Media\Utility\ModuleUtility;

/**
 * View helper which renders a dropdown menu for storage.
 */
class ButtonAnalyseIndexViewHelper extends AbstractViewHelper {

	/**
	 * @var string
	 */
	protected $extensionName = 'media';

	/**
	 * Renders a dropdown menu for storage.
	 *
	 * @return string
	 */
	public function render() {

		$result = '';
		if ($this->getBackendUser()->isAdmin()) {

			$result = sprintf('<a href="%s&returnUrl=%s" class="btn">Analyse index</a>',
				ModuleUtility::getUri('analyseIndex', 'Tool'),
				urlencode($GLOBALS['_SERVER']['REQUEST_URI'])
			);
		}
		return $result;
	}

	/**
	 * Returns an instance of the current Backend User.
	 *
	 * @return \TYPO3\CMS\Core\Authentication\BackendUserAuthentication
	 */
	protected function getBackendUser() {
		return $GLOBALS['BE_USER'];
	}
}