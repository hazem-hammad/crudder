<?php

namespace App\Foundation\Enums;

enum ResponseMessage
{
    case UPDATED_SUCCESSFULLY;
    case CREATED_SUCCESSFULLY;
    case DELETED_SUCCESSFULLY;
    case SOMETHING_WENT_WRONG;
    case UNABLE_TO_UPLOAD_FILE;
    case REPLY_ADDED_SUCCESSFULLY;
    case SENT_SUCCESSFULLY;
    case LOGGED_OUT_SUCCESSFULLY;
    case UNKNOWN_PERMISSION;

    public function getMessage(): string
    {
        return match ($this) {
            self::UPDATED_SUCCESSFULLY => __('lang.Updated successfully'),
            self::CREATED_SUCCESSFULLY => __('lang.Created successfully'),
            self::DELETED_SUCCESSFULLY => __('lang.Deleted successfully'),
            self::SOMETHING_WENT_WRONG => __('lang.Something went wrong'),
            self::UNABLE_TO_UPLOAD_FILE => __('lang.Unable to upload file'),
            self::REPLY_ADDED_SUCCESSFULLY => __('lang.Reply added successfully'),
            self::SENT_SUCCESSFULLY => __('lang.Sent successfully'),
            self::LOGGED_OUT_SUCCESSFULLY => __('lang.Logged out successfully'),
            self::UNKNOWN_PERMISSION => __('lang.Unknown permission'),
        };
    }
}
