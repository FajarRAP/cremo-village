<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{

    public function index(Request $request)
    {
        $residents = Resident::query();

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $residents->where('name', 'like', "%$keyword%");
        }

        return view('dashboard.resident-records.index', [
            'residents' => $residents->paginate(10)
        ]);
    }

    public function edit(Resident $resident)
    {
        return view('dashboard.resident-records.edit', [
            'resident' => $resident
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'birth_date' => 'required',
        ]);

        Resident::create($validated);

        return redirect(route('dashboard.resident-records', absolute: false));
    }

    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'name' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'birth_date' => 'required',
        ]);

        $resident->update($validated);

        return redirect(route('dashboard.resident-records', absolute: false));
    }

    public function delete(Resident $resident)
    {
        $resident->delete();

        return redirect(route('dashboard.resident-records', absolute: false));
    }
}
