<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\GuestBook;
use App\Models\Resident;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $guestbook = new GuestBook();
        $resident = new Resident();

        $residentCount = $resident->count();
        $residents = $resident->latest()->limit(5)->get();
        $guestbookCount = $guestbook->count();
        $guestbooks = $guestbook->latest()->limit(5)->get();
        $agendas = $this->getAgendas($request->input('date'));


        return view('dashboard.dashboard', [
            'residentCount' => $residentCount,
            'guestbookCount' => $guestbookCount,
            'guestbooks' => $guestbooks,
            'residents' => $residents,
            'agendas' => $agendas,
        ]);
    }

    private function getAgendas(?string $date)
    {
        $agendas = Agenda::orderByDesc('date');

        if ($date) {
            [$year, $month] = explode('-', $date);
            $agendas->whereYear('date', '=', $year)
                ->whereMonth('date', '=', $month);
        } else {
            $agendas->limit(5);
        }

        return $agendas->get();
    }
}
