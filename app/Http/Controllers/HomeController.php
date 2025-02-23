<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Resident;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $date = now()->format('Y-m');
        [$year, $month] = explode('-', $date);
        $residents = new Resident();
        $agendas = Agenda::whereYear('date', '=', $year)
            ->whereMonth('date', '=', $month)
            ->get();
        $male_count = $residents->where('gender', '=', 'Laki-laki')->count();
        $female_count = $residents->where('gender', '=', 'Perempuan')->count();

        return view('home', [
            'ratio' => $this->simplifyRatio($male_count, $female_count),
            'resident_count' => $residents->count(),
            'male_count' => $male_count,
            'female_count' => $female_count,
            'agendas' => $agendas,
        ]);
    }

    private function greatestCommonDivisor(int $a, int $b)
    {
        $remainder = -1;

        while (($a % $b) > 0) {
            $remainder = $a % $b;
            $a = $b;
            $b = $remainder;
        }

        return $b;
    }

    private function simplifyRatio(int $a, int $b)
    {
        $gcd = $this->greatestCommonDivisor($a, $b);

        return $a / $gcd . ':' . $b / $gcd;
    }
}
