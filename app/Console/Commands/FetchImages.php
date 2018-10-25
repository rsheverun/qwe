<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Camimage;
use App\Activity;
use Carbon\Carbon;
use Mail;
use App\Mail\Notification;

class FetchImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:images';

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
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->subMinute()->toTimeString();
        $images = Camimage::whereDate('datum','>=', $date)->whereTime('datum', '>=', $time)->get();
        foreach ($images as $image) {
            Activity::create([
                'name' => 'new image',
                'image_id' => $image->id,
                'date' => $image->datum
            ]);
            $users = $image->camera->usergroups()->with('users')->get()->pluck('users')->collapse();
            foreach ($users as $user) {
                if($user->notification == true) {
                    Mail::to($user->email)->send(new Notification($user));
                }
            }
        }
    }
}
