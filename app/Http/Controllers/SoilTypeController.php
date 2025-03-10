<?php

namespace App\Http\Controllers;

use App\Models\SoilType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SoilTypeRequest;

class SoilTypeController extends Controller
{
    public function index()
    {
        $soilTypes = SoilType::paginate(10);

        return view('soil_types.index', compact('soilTypes'));
    }

    public function create()
    {
        return view('soil_types.create');
    }

    public function store(SoilTypeRequest $request)
    {
        $soilType = SoilType::create($request->validated());

        return redirect()->back()->with([
            'success' => 'Soil type created successfully',
            'cta' => ['message' => 'See it here', 'link' => route('soil_types.edit', $soilType)],
        ]);
    }

    public function show(SoilType $soilType)
    {
        return view('soil_types.show', compact('soilType'));
    }

    public function edit(SoilType $soilType)
    {
        return view('soil_types.edit', compact('soilType'));
    }

    public function update(SoilTypeRequest $request, SoilType $soilType)
    {
        $soilType->update($request->validated());

        return redirect()->back()->with('success', 'Soil type updated successfully');
    }

    public function destroy($soilTypeId)
    {
        SoilType::destroy($soilTypeId);

        return redirect()->back()->with('success', 'Soil type deleted successfully');
    }
}
