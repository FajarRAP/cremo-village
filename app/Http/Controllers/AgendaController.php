<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $agendas = Agenda::query();

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $agendas->where('title', 'like', "%$keyword%");
        }

        return view('dashboard.agenda.index', [
            'agendas' => $agendas->orderByDesc('date')->paginate(10)->appends($request->query()),
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
        $validated = $request->validateWithBag('storeAgenda', [
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

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect(route('dashboard.agendas', absolute: false));
    }
}
