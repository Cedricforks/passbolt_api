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
namespace Passbolt\TestData\Command\Large;

use App\Utility\UuidFactory;
use Cake\Core\Configure;
use Passbolt\TestData\Lib\DataCommand;

class GroupsUsersDataCommand extends DataCommand
{
    public $entityName = 'GroupsUsers';

    /**
     * Get groups users settings
     *
     * @return array
     */
    protected function getGroupsUsersSettings(): array
    {
        $usersTable = $this->fetchTable('Users');
        // all users in one group
        $data['all_users']['managers'] = ['admin'];
        $users = $usersTable->find()->where(['deleted' => 0, 'active' => 1])->all();
        $max = Configure::read('PassboltTestData.scenarios.large.install.count.users');
        for ($i = 0; $i < $max; $i++) {
            $data['all_users']['users'][] = "user_$i";
        }

        return $data;
    }

    /**
     * Get the groups users association data
     *
     * @return array
     */
    public function getData(): array
    {
        $groupsUsers = [];
        $settings = $this->getGroupsUsersSettings();

        foreach ($settings as $groupAlias => $groupSettings) {
            // managers
            foreach ($groupSettings['managers'] as $managerAlias) {
                $groupsUsers[] = [
                    'id' => UuidFactory::uuid("group_user.id.$groupAlias-$managerAlias"),
                    'group_id' => UuidFactory::uuid("group.id.$groupAlias"),
                    'user_id' => UuidFactory::uuid("user.id.$managerAlias"),
                    'is_admin' => 1,
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                    'created_by' => UuidFactory::uuid('user.id.admin'),
                    'modified_by' => UuidFactory::uuid('user.id.admin'),
                ];
            }
            // members
            foreach ($groupSettings['users'] as $userAlias) {
                if (in_array($userAlias, $groupSettings['managers'])) {
                    continue;
                }
                $groupsUsers[] = [
                    'id' => UuidFactory::uuid("group_user.id.$groupAlias-$userAlias"),
                    'group_id' => UuidFactory::uuid("group.id.$groupAlias"),
                    'user_id' => UuidFactory::uuid("user.id.$userAlias"),
                    'is_admin' => 0,
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                    'created_by' => UuidFactory::uuid('user.id.admin'),
                    'modified_by' => UuidFactory::uuid('user.id.admin'),
                ];
            }
        }

        return $groupsUsers;
    }
}
