<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use App\Models\Resident;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $guestbook = new GuestBook();
        $resident = new Resident();
        $residentCount = $resident->count();
        $residents = $resident->latest()->limit(5)->get();
        $guestbookCount = $guestbook->count();
        $guestbooks = $guestbook->latest()->limit(5)->get();

        return view('dashboard.dashboard', [
            'residentCount' => $residentCount,
            'guestbookCount' => $guestbookCount,
            'guestbooks' => $guestbooks,
            'residents' => $residents,
        ]);
    }
}
