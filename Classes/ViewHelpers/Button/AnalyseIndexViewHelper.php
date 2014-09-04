<?php
namespace TYPO3\CMS\Media\ViewHelpers\Button;

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

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Media\Module\Parameter;

/**
 * View helper which renders a button "AnalyseIndex".
 */
class AnalyseIndexViewHelper extends AbstractViewHelper {

	/**
	 * Renders a button for "AnalyseIndex".
	 *
	 * @return string
	 */
	public function render() {

		$result = '';
		if ($this->getBackendUser()->isAdmin()) {

			$result = sprintf('<a href="%s&returnUrl=%s" class="btn">Analyse index</a>',
				$this->getAnalyseIndexUri(),
				urlencode($GLOBALS['_SERVER']['REQUEST_URI'])
			);
		}
		return $result;
	}

	/**
	 * @param
	 * @return string
	 */
	protected function getAnalyseIndexUri() {
		$urlParameters = array(
			Parameter::PREFIX => array(
				'controller' => 'Tool',
				'action' => 'analyseIndex'
			),
		);
		return BackendUtility::getModuleUrl(Parameter::MODULE_SIGNATURE, $urlParameters);
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