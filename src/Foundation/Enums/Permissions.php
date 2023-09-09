<?php

namespace App\Foundation\Enums;

enum Permissions
{
    const VIEW_ROLES = 'view roles';
    const UPDATE_ROLE = 'update role';
    const CREATE_ROLE = 'create role';
    const VIEW_ADMINS = 'view admins';

    const UPDATE_ADMIN = 'update admin';

    const CREATE_ADMIN = 'create admin';

    const SHOW_ADMIN = 'show admin';

    const CHANGE_ADMIN_STATUS = 'change admin status';

    // Base module permissions
    const LIST_BASE_MODULES = 'list base modules';
    const UPDATE_BASE_MODULE = 'update base module';
    const CREATE_BASE_MODULE = 'create base module';
    const SHOW_BASE_MODULE = 'show base module';
    const DELETE_BASE_MODULE = 'delete base module';
    const CHANGE_BASE_MODULE_STATUS = 'change base module status';

    // append permissions here
}
