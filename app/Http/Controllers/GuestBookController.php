<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index(Request $request)
    {
        $guestbooks = GuestBook::query();

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $guestbooks->where('name', 'like', "%$keyword%");
        }

        return view('dashboard.guest-book.index', [
            'guestbooks' => $guestbooks->paginate(10)->appends($request->query()),
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
        $validated = $request->validateWithBag('storeGuestBook', [
            'name' => 'required',
            'origin' => 'required',
            'visit_date' => 'required',
            'purpose' => 'required',
            'description' => 'required',
        ]);

        GuestBook::create($validated);

        return redirect(route('dashboard.guest-book', absolute: false));
    }

    public function destroy(GuestBook $guestbook)
    {
        $guestbook->delete();

        return redirect(route('dashboard.guest-book', absolute: false));
    }
}
