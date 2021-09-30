<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class LastMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lastmonth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all posts from last month.';

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
     * @return int
     */
    public function handle()
    {
        $startLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $startThisMonth = Carbon::now()->startOfMonth()->toDateString();
        $users = User::all();
        foreach($users as $user){                    
            $posts = $user->posts()->whereBetween('created_at', [$startLastMonth, $startThisMonth])->pluck('title', 'created_at');
            $text = '';
            if ($posts->isEmpty()){
                $text = 'No posts in last month.';
            } else {
                foreach ($posts as $created_at => $title) {
                    $text .= $title . ' @ ' . Carbon::parse($created_at)->format('F j, Y') . "\n";
                }
            }     
            Mail::raw($text, function($message) use ($user) {
                $message->from('admin@example.com', 'Mh Blog')->to($user->email)->subject('All posts from last month.');
            });

            $this->info('Done');

        }
    }
}
