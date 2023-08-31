<?php

namespace App\Enums;

enum Permission
{
    const VIEW_EMAIL_TEMPLATES = 'view email templates';
    const VIEW_MESSENGER = 'view messenger';
    const VIEW_ROLES = 'view roles';
    const UPDATE_ROLE = 'update role';
    const CREATE_ROLE = 'create role';
    const VIEW_ADMINS = 'view admins';
    const UPDATE_ADMIN = 'update admin';
    const CREATE_ADMIN = 'create admin';
    const CHANGE_ADMIN_STATUS = 'change admin status';

    const CHANGE_ADMIN_PROFILE_IMAGE = 'change admin profile image';


    const VIEW_SEASONS = 'view seasons';
    const UPDATE_SEASON = 'update season';
    const CREATE_SEASON = 'create season';
    const CHANGE_SEASON_STATUS = 'change season status';

    const VIEW_TICKETS = 'view tickets';
    const CREATE_TICKET = 'create ticket';
    const UPDATE_TICKET = 'update ticket';
    const DELETE_TICKET = 'delete ticket';

    const CHANGE_TICKET_STATUS = 'change ticket status';
    const SHOW_TICKET = 'change ticket status';

    const REPLY_TICKET = 'reply ticket';

    const UPDATE_TICKET_REPLIES = 'update ticket replies';

    const SHOW_ALL_TICKETS = 'show all tickets';

    const ADD_TICKET_NOTES = 'add ticket notes';

    const EXPORT_TICKETS = 'export tickets';
    const ASSIGN_TICKET = 'assign ticket';

    const VIEW_LIVE_CHAT = 'view live chat';
    const VIEW_REPORTS = 'view reports';

}
