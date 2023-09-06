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
    const CHANGE_ADMIN_STATUS = 'change admin status';
    const CHANGE_ADMIN_PROFILE_IMAGE = 'change admin profile image';
}
