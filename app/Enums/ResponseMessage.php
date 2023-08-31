<?php

namespace App\Enums;

enum ResponseMessage
{
    case UPDATED_SUCCESSFULLY;
    case CREATED_SUCCESSFULLY;
    case DELETED_SUCCESSFULLY;

    case SOME_THING_WENT_WRONG;
    case UNABLE_TO_UPLOAD_FILE;
    case REPLY_ADDED_SUCCESSFULLY;
    case SEND_SUCCESSFULLY;
    case SEND_EMAIL_WITH_EXPORTED_TICKETS;

    public function getMessage(): string
    {
        return match ($this) {
            self::UPDATED_SUCCESSFULLY => __('lang.Updated successfully'),
            self::CREATED_SUCCESSFULLY => __('lang.Created successfully'),
            self::DELETED_SUCCESSFULLY => __('lang.Deleted successfully'),
            self::SOME_THING_WENT_WRONG => __('lang.Something went wrong'),
            self::UNABLE_TO_UPLOAD_FILE => __('lang.Unable to upload file'),
            self::REPLY_ADDED_SUCCESSFULLY => __('lang.Reply added successfully'),
            self::SEND_SUCCESSFULLY => __('lang.Send message successfully'),
            self::SEND_EMAIL_WITH_EXPORTED_TICKETS => __('lang.We will send you and email with exported tickets'),
        };
    }
}
