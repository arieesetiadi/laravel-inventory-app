<?php

namespace App\Constants;

class UserRole
{
    /**
     * Owner role value.
     *
     * @var int
     */
    public const OWNER = 'Owner';

    /**
     * Owner role value.
     *
     * @var int
     */
    public const ADMIN = 'Admin';

    /**
     * Owner role value.
     *
     * @var int
     */
    public const SALES = 'Sales';

    /**
     * Owner role value.
     *
     * @var int
     */
    public const PETUGAS_GUDANG = 'Petugas Gudang';

    /**
     * All Roles value
     */
    public static function values()
    {
        return [
            self::OWNER,
            self::ADMIN,
            self::SALES,
            self::PETUGAS_GUDANG,
        ];
    }
}
