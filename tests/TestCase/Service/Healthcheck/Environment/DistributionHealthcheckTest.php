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
namespace App\Test\TestCase\Service\Healthcheck\Environment;

use App\Service\Healthcheck\Environment\DistributionHealthcheck;
use Cake\TestSuite\TestCase;

/**
 * @covers \App\Service\Healthcheck\Environment\DistributionHealthcheck
 */
class DistributionHealthcheckTest extends TestCase
{
    public function testHealthcheckDistributionIsPassed_Success(): void
    {
        $service = new DistributionHealthcheck();
        $service->check();
        $this->assertTrue($service->isPassed());
    }

    public function testHealthcheckDistributionIsPassed_Fail(): void
    {
        $service = $this->getMockBuilder(DistributionHealthcheck::class)
            ->onlyMethods(['detectDistribution'])
            ->getMock();
        $service->expects($this->once())->method('detectDistribution')->willReturn(null);
        $service->check();
        $this->assertFalse($service->isPassed());
    }
}
