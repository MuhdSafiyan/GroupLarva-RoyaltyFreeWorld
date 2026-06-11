<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $search = $request->search;

    $query = Merchandise::query();

    if ($search) {
        $query->where('name', 'LIKE', "%{$search}%")
              ->orWhere('description', 'LIKE', "%{$search}%");
    }

    $merchandises= $query->get();

    return view('merchandise.index', compact('merchandises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchandise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'price'      => 'required|numeric',
            'stock'      => 'required|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->except(['image_file']);
        $data['user_id'] = auth()->id();

        // Logik Upload Gambar
        if ($request->hasFile('image_file')) {
            $fileName = time() . '_' . $request->file('image_file')->getClientOriginalName();
            $request->file('image_file')->move(public_path('merchandise_files'), $fileName);
            $data['image_file'] = $fileName;
        }

        Merchandise::create($data);

        return redirect('/merchandise');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchandise $merchandise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchandise $merchandise)
    {
        return view('merchandise.edit', compact('merchandise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchandise $merchandise)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image_file'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Proses Update Gambar
        if ($request->hasFile('image_file')) {
            // Padam fail lama jika ada
            if ($merchandise->image_file && file_exists(public_path('merchandise_files/' . $merchandise->image_file))) {
                unlink(public_path('merchandise_files/' . $merchandise->image_file));
            }

            $file = $request->file('image_file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('merchandise_files'), $fileName);
            
            $data['image_file'] = $fileName;
        }

        $merchandise->update($data);
        return redirect('/merchandise');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchandise $merchandise)
    {
        // Padam fail fizikal sebelum padam record database
        if ($merchandise->image_file && file_exists(public_path('merchandise_files/' . $merchandise->image_file))) {
            unlink(public_path('merchandise_files/' . $merchandise->image_file));
        }

        $merchandise->delete();
        return redirect('/merchandise');
    }
}
