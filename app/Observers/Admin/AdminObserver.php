<?php

namespace App\Observers\Admin;


use App\Emails\SendAdminCredentialsMail;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Mail;

class AdminObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public bool $afterCommit = true;

    /**
     * Handle the Admin "created" event.
     *
     * @param Admin $admin
     * @return void
     */
    public function created(Admin $admin): void
    {
        Mail::to($admin->email)->send(new SendAdminCredentialsMail($admin));
    }

    /**
     * Handle the Admin "updated" event.
     *
     * @param Admin $admin
     * @return void
     */
    public function updated(Admin $admin): void
    {
        //
    }

    /**
     * Handle the Admin "deleted" event.
     *
     * @param Admin $admin
     * @return void
     */
    public function deleted(Admin $admin): void
    {
        //
    }

    /**
     * Handle the Admin "restored" event.
     *
     * @param Admin $admin
     * @return void
     */
    public function restored(Admin $admin): void
    {
        //
    }

    /**
     * Handle the Admin "force deleted" event.
     *
     * @param Admin $admin
     * @return void
     */
    public function forceDeleted(Admin $admin): void
    {
        //
    }
}
