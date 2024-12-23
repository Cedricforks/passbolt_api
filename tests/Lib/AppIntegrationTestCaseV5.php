<?php
declare(strict_types=1);

/**
 * Passbolt ~ Open source password manager for teams
 * Copyright (c) Passbolt SA (https://www.passbolt.com)
 *
 * Licensed under GNU Affero General Public License version 3 of the or any later version.
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Passbolt SA (https://www.passbolt.com)
 * @license       https://opensource.org/licenses/AGPL-3.0 AGPL License
 * @link          https://www.passbolt.com Passbolt(tm)
 * @since         4.10.0
 */
namespace App\Test\Lib;

use Cake\Core\Configure;
use Passbolt\Metadata\Service\MetadataKeysSettingsGetService;
use Passbolt\Metadata\Service\MetadataTypesSettingsGetService;

abstract class AppIntegrationTestCaseV5 extends AppIntegrationTestCase
{
    /**
     * @var bool $isV5Enabled
     */
    protected $isV5Enabled;

    /**
     * Setup.
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->isV5Enabled = Configure::read('passbolt.v5.enabled');
        if (!$this->isV5Enabled) {
            Configure::write('passbolt.v5.enabled', true);
        }
    }

    /**
     * Tear down
     */
    public function tearDown(): void
    {
        if (!$this->isV5Enabled) {
            Configure::write('passbolt.v5.enabled', false);
        }
        MetadataTypesSettingsGetService::clear();
        MetadataKeysSettingsGetService::clear();
        parent::tearDown();
    }
}
