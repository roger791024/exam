<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Logout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'logout:token {token}';
    protected $signature = 'logout:id {id}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Logout user';

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
        $user = \App\User::find($this->argument('id'));
        event(new \App\Events\logout($user));
    }
}
