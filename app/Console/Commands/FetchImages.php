<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Camimage;
use App\Activity;
use Carbon\Carbon;
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
        // dd(Carbon::now()->subMinute()->toDateTimeString());
        $images = Camimage::all();
        foreach ($images as $image) {
            Activity::create([
                'name' => 'new image',
                'image_id' => $image->id,
                'date' => $image->datum
            ]);
        }

    }
}
