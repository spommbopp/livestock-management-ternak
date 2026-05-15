<?php

namespace App\Http\Controllers;
use App\Models\Livestock;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $livestocks = Livestock::all();
    // Di sini tambahkan 's' pada nama folder view-nya
    return view('livestocks.index', compact('livestocks')); 
}

public function store(Request $request)
{
    // Validasi input 
    $request->validate([
        'name' => 'required',
        'type' => 'required',
        'weight' => 'required|numeric',
    ]);

    // Simpan data ke database melalui Model [cite: 34, 35]
    Livestock::create($request->all());

    return redirect()->route('livestocks.index')->with('success', 'Data berhasil ditambahkan!');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
