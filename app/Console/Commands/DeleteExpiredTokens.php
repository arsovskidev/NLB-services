<?php

namespace App\Console\Commands;

use App\Models\Token;
use Illuminate\Console\Command;

use Carbon\Carbon;

class DeleteExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all expired tokens from database';

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
        $today = date('Y-m-d h:i:s');
        $tokens = Token::where("expires_at", "<=", $today);

        if($tokens->delete()) {
            $this->info("Tokens deleted");
        }
    }
}
