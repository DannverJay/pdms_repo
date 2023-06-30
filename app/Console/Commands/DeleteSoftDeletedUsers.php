<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteSoftDeletedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-soft-deleted-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Permanently delete soft deleted users after a year.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::onlyTrashed()->get();

        foreach ($users as $user) {
            if ($user->deleted_at->addYear()->isPast()) {
                $user->forceDelete();
            }
        }

        $this->info('Archived users permanently deleted.');
    }
}
