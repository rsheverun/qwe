<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Camimage;
use App\User;
use Mail;
use App\Mail\Notification;
class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::where('notification', 1)->with('usergroups')->whereHas('usergroups', function($query){
            $query->with('cameras')->whereHas('cameras', function($query){
                $query->with('camImages')->whereHas('camImages', function($query) {
                    $query->where('datum', '<=', Carbon::now()->subMinutes(30)->toDateTimeString());
                });
            });
        })->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new Notification($user));
        }
    }
}
