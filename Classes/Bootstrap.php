<?php
namespace Helhum\T3Dev;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Helmut Hummel <helmut.hummel@typo3.org>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the text file GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use Helhum\T3Dev\Console\Application;

/**
 * Class Bootstrap
 */
class Bootstrap {

	/**
	 * @throws \Exception
	 */
	public function run() {
		$this->ensureRequiredEnvironment();

		$application = new Application();
		$application->run();
	}

	/**
	 *
	 */
	protected function ensureRequiredEnvironment() {
		foreach (array(__DIR__ . '/../vendor/autoload.php', __DIR__ . '/../../../autoload.php') as $possibleAutoloadFileLocation) {
			if (file_exists($possibleAutoloadFileLocation)) {
				return include $possibleAutoloadFileLocation;
			}
		}

		die('You must set up the project dependencies, run the following commands:' . PHP_EOL
			. 'curl -s http://getcomposer.org/installer | php' . PHP_EOL
			. 'php composer.phar install' . PHP_EOL);
	}
} 