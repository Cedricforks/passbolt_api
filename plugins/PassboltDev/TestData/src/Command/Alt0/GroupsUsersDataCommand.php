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
 * @since         2.0.0
 */
namespace Passbolt\TestData\Command\Alt0;

use Passbolt\TestData\Command\Base\GroupsUsersDataCommand as BaseGroupsUsersDataCommand;

class GroupsUsersDataCommand extends BaseGroupsUsersDataCommand
{
    public string $fixtureName = 'GroupsUsers';

    /**
     * @inheritDoc
     */
    protected function getGroupsUsersSettings(): array
    {
        return [
            'accounting' => [
                'managers' => ['ada'],
                'users' => ['ada', 'betty'],
            ],
            'board' => [
                'managers' => ['ada', 'betty'],
                'users' => ['ada', 'betty'],
            ],
            'creative' => [
                'managers' => ['ada'],
                'users' => ['ada'],
            ],
            'developer' => [
                'managers' => ['ada', 'betty'],
                'users' => ['ada', 'betty'],
            ],
            'ergonom' => [
                'managers' => ['dame'],
                'users' => ['dame'],
            ],
            'freelancer' => [
                'managers' => ['edith'],
                'users' => ['edith', 'frances', 'grace'],
            ],
            'human_resource' => [
                'managers' => ['yvonne'],
                'users' => ['yvonne', 'joan'],
            ],
            'leadership_team' => [
                'managers' => ['nancy'],
                'users' => ['nancy'],
            ],
            'management' => [
                'managers' => ['orna'],
                'users' => ['orna', 'ping'],
            ],
            'marketing' => [
                'managers' => ['ada'],
                'users' => ['ada'],
            ],
            'network' => [
                'managers' => ['ursula'],
                'users' => ['ursula'],
            ],
            'operations' => [
                'managers' => ['wang'],
                'users' => ['wang'],
            ],
            'procurement' => [
                'managers' => ['wang'],
                'users' => ['wang'],
            ],
            'quality_assurance' => [
                'managers' => ['hedy'],
                'users' => ['hedy'],
            ],
            'resource_planning' => [
                'managers' => ['adele'],
                'users' => ['adele'],
            ],
        ];
    }
}
