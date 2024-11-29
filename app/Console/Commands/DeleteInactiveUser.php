<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteInactiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactive-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("------DeleteInactiveUser-----Run Successfully!");
        $users = User::all();



        Log::info(['users'=>'success']);
        // ekhane condition dite hobe j opertation calate cai tar,, jemon inactive user delete er jonno condition.
        return;
    }
}
