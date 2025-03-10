<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
use App\Http\Requests\CropRequest;
use Illuminate\Support\Facades\DB;

class CropController extends Controller
{
    public function index()
    {
        $crops = Crop::paginate(10);

        return view('crops.index', compact('crops'));
    }

    public function create()
    {
        return view('crops.create');
    }

    public function store(CropRequest $request)
    {
        $crop = Crop::create($request->validated());

        return redirect()->back()->with([
            'success' => 'Crop created successfully',
            'cta' => ['message' => 'See it here', 'link' => route('crops.edit', $crop)],
        ]);
    }

    public function show(Crop $crop)
    {
        return view('crops.show', compact('crop'));
    }

    public function edit(Crop $crop)
    {
        return view('crops.edit', compact('crop'));
    }

    public function update(CropRequest $request, Crop $crop)
    {
        $crop->update($request->validated());

        return redirect()->back()->with('success', 'Crop updated successfully');
    }

    public function destroy($cropId)
    {
        Crop::destroy($cropId);

        return redirect()->back()->with('success', 'Crop deleted successfully');
    }
}
