<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::paginate(10);
        return view('dashboard.agenda.index', [
            'agendas' => $agendas
        ]);
    }

    public function edit(Agenda $agenda)
    {
        return view('dashboard.agenda.edit', [
            'agenda' => $agenda
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);

        Agenda::create($validated);

        return redirect(route('dashboard.agendas', absolute: false));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);

        $agenda->update($validated);

        return redirect(route('dashboard.agendas', absolute: false));
    }

    public function delete(Agenda $agenda)
    {
        $agenda->delete();

        return redirect(route('dashboard.agendas', absolute: false));
    }
}
