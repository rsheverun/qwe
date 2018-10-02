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
        $date = Carbon::now()->subMinutes(30);
        $images = Camimage::all();
        // $users = User::all();
        foreach ($images as $image) {
            foreach ($image->camera->usergroups as $k=>$group) {
                if($k%2 == 0) continue;
                foreach ($group->users as $user){
                    if ($user->notification == 1) {
                        Mail::to($user->email)->send(new Notification($user));
                    }
                }
            }
        }
    }
}
