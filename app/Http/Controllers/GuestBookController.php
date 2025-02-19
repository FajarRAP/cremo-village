<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
        $guestbooks = GuestBook::query();

        return view('dashboard.guest-book.index', [
            'guestbooks' => $guestbooks->paginate(10),
        ]);
    }

    public function edit(GuestBook $guestbook)
    {
        return view('dashboard.guest-book.edit', [
            'guestbook' => $guestbook,
        ]);
    }

    public function update(Request $request, GuestBook $guestbook)
    {
        $validated = $request->validate([
            'name' => 'required',
            'origin' => 'required',
            'visit_date' => 'required',
            'purpose' => 'required',
            'description' => 'required',
        ]);

        $guestbook->update($validated);

        return redirect(route('dashboard.guest-book', absolute: false));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'origin' => 'required',
            'visit_date' => 'required',
            'purpose' => 'required',
            'description' => 'required',
        ]);

        GuestBook::create($validated);

        return redirect(route('dashboard.guest-book', absolute: false));
    }

    public function delete(GuestBook $guestbook)
    {
        $guestbook->delete();

        return redirect(route('dashboard.guest-book', absolute: false));
    }
}
