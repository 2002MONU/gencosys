<?php

namespace App\Listeners;

use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;

class AdminLogin
{
    public $request;
    /**
     * Create the event listener.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if ($event->user->isAdmin()) {
            DB::table('admin_logs')->insert([
                'admin_email' => $event->user->email,
                'ip_address' => $this->request->ip(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
