<?php
namespace App\Helper\Enums;

final class UserRole{
    const ADMIN = 0;
    const EMPLOYEE = 1;

    const ROLE_LIST = [
        'Admin',
        'Employee',
    ];

    public static function getName($role){
        return self::ROLE_LIST[$role];
    }
}
?>
