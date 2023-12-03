<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountStatus extends Model
{
    use HasFactory;

    public const T_STATUS_ACTIVE = 1;
    public const T_STATUS_PENDING_ACTIVATION = 10;
    public const T_STATUS_RESETTING_PASSWORD = 20;
    public const T_STATUS_PASSWORD_EXPIRED = 30;
    public const T_STATUS_DEACTIVATED = 40;
    public const T_STATUS_SUSPENDED = 50;
    public const T_STATUS_LOCKED_OUT = 60;
    public const T_STATUS_EXPIRED = 70;

    public const T_STATUS_COLLECTION = [
        self::T_STATUS_ACTIVE,
        self::T_STATUS_PENDING_ACTIVATION,
        self::T_STATUS_RESETTING_PASSWORD,
        self::T_STATUS_PASSWORD_EXPIRED,
        self::T_STATUS_DEACTIVATED,
        self::T_STATUS_SUSPENDED,
        self::T_STATUS_LOCKED_OUT,
        self::T_STATUS_EXPIRED,
    ];

    public const T_STATUSES = [
        self::T_STATUS_ACTIVE => [
            'id' => self::T_STATUS_ACTIVE,
            'title' => 'Active',
            'description' => 'Active accounts.'
        ],

        self::T_STATUS_PENDING_ACTIVATION => [
            'id' => self::T_STATUS_PENDING_ACTIVATION,
            'title' => 'Pending activation',
            'description' => 'Account is pending activation.'
        ],

        self::T_STATUS_RESETTING_PASSWORD => [
            'id' => self::T_STATUS_RESETTING_PASSWORD,
            'title' => 'Resetting password',
            'description' => 'Account is awaiting password reset action.'
        ],

        self::T_STATUS_PASSWORD_EXPIRED => [
            'id' => self::T_STATUS_PASSWORD_EXPIRED,
            'title' => 'Password expired',
            'description' => 'Account password has expired. To successfully authenticate, password must be reset first.'
        ],

        self::T_STATUS_DEACTIVATED => [
            'id' => self::T_STATUS_DEACTIVATED,
            'title' => 'Deactivated',
            'description' => 'Account is deactivated. No authentication is possible.'
        ],

        self::T_STATUS_SUSPENDED => [
            'id' => self::T_STATUS_SUSPENDED,
            'title' => 'Suspended',
            'description' => 'Account has been suspended. No authentication is possible.'
        ],

        self::T_STATUS_LOCKED_OUT => [
            'id' => self::T_STATUS_LOCKED_OUT,
            'title' => 'Locked out',
            'description' => 'Account is locked out due to too many failed authentication attempts.'
        ],

        self::T_STATUS_EXPIRED => [
            'id' => self::T_STATUS_EXPIRED,
            'title' => 'Expired',
            'description' => 'Account has expired. Authentication is not possible unless expiry is extended.'
        ],
    ];

    protected $table = 'account_statuses';
}
