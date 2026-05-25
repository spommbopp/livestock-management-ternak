<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LivestockController extends Controller
{
    public function index(): View
    {
        $livestocks = Livestock::latest()->get();

        return view('livestocks.index', compact('livestocks'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'weight' => 'required|numeric|min:1',
        ]);

        Livestock::create($validated);

        return redirect()->route('livestocks.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Livestock $livestock): View
    {
        return view('livestocks.edit', compact('livestock'));
    }

    public function update(Request $request, Livestock $livestock): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'weight' => 'required|numeric|min:1',
        ]);

        $livestock->update($validated);

        return redirect()->route('livestocks.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Livestock $livestock): RedirectResponse
    {
        $livestock->delete();

        return redirect()->route('livestocks.index')->with('success', 'Data ternak berhasil dihapus!');
    }
}
