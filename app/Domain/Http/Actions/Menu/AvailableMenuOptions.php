<?php

namespace App\Domain\Http\Actions\Menu;

class AvailableMenuOptions
{
    protected array $result = [];

    public function execute(string $language = 'en'): self
    {
        $this->result = [

            [
                'title' => trans('ui.idp', [], $language),
                'url' => '/administration/idp',
                'submenu' => []
            ],

            [
                'title' => trans('ui.applications', [], $language),
                'url' => '/administration/applications',
                'submenu' => [
                    [
                        'title' => trans('ui.applications', [], $language),
                        'url' => '/administration/applications'
                    ],

                    [
                        'title' => trans('ui.servers', [], $language),
                        'url' => '/administration/applications/servers'
                    ],
                ]
            ],

            [
                'title' => trans('ui.user.management', [], $language),
                'url' => '/administration/user/management',
                'submenu' => [
                    [
                        'title' => trans('ui.user.management', [], $language),
                        'url' => '/administration/users/management',
                    ],

                    [
                        'title' => trans('ui.user.sources', [], $language),
                        'url' => '/administration/users/sources',
                    ],
                ]
            ],

            [
                'title' => trans('ui.authentication'),
                'url' => '/administration/authentication',
                'submenu' => [
                    [
                        'title' => trans('ui.engines'),
                        'url' => '/administration/authentication/engines'
                    ],

                    [
                        'title' => trans('ui.connections'),
                        'url' => '/administration/authentication/connections'
                    ]
                ]
            ],

            [
                'title' => trans('ui.organizations'),
                'url' => '/administration/organizations',
                'submenu' => []
            ],

            [
                'title' => trans('ui.roles'),
                'url' => '/administration/roles',
                'submenu' => []
            ],

            [
                'title' => trans('ui.permissions'),
                'url' => '/administration/permissions',
                'submenu' => []
            ],

            [
                'title' => trans('ui.mfa'),
                'url' => '/administration/mfa',
                'submenu' => []
            ]
        ];

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
