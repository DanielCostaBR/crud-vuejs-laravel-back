<?php

namespace App\Console\Commands;

use App\Models\Data;
use App\Notifications\DataRegister;
use Illuminate\Console\Command;

class DataRegisterCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:data-register-check';

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
        $data = Data::registers()->get();

        $data->each(function($data){
            $data->user->notify(new DataRegister($data));
        });
    }
}
