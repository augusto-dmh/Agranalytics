<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Farm;
use App\Models\Farmer;
use App\Models\SoilType;
use Illuminate\Http\Request;
use App\Models\IrrigationMethod;
use App\Http\Requests\FarmRequest;
use Illuminate\Support\Facades\DB;

class FarmController extends Controller
{
    // protected $fillable = [
    //     'name',
    //     'address',
    //     'size_in_ha',
    //     'farmer_id',
    //     'soil_type_id',
    //     'irrigation_method_id',
    // ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms = Farm::with('farmer', 'soilType', 'irrigationMethod', 'crops')->paginate(10);

        return view('farms.index', compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $farmers = Farmer::all();
        $soilTypes = SoilType::all();
        $irrigationMethods = IrrigationMethod::all();
        $crops = Crop::all();

        return view('farms.create', compact('farmers', 'soilTypes', 'irrigationMethods', 'crops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FarmRequest $request)
    {
        $farm = Farm::create($request->validated());

        $farm->crops()->attach($request->crop_id);

        return redirect()->back()->with([
            'success' => 'Farm created successfully',
            'cta' => ['message' => 'See it here', 'link' => route('farms.edit', $farm)],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Farm $farm)
    {
        $farm->load('farmer', 'soilType', 'irrigationMethod', 'crops');

        return view('farms.show', compact('farm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farm $farm)
    {
        $farmers = Farmer::all();
        $soilTypes = SoilType::all();
        $irrigationMethods = IrrigationMethod::all();
        $crops = Crop::all();

        return view('farms.edit', compact('farm', 'farmers', 'soilTypes', 'irrigationMethods', 'crops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FarmRequest $request, Farm $farm)
    {
        $farm->update($request->validated());

        $farm->crops()->sync($request->crop_id);

        return redirect()->back()->with('success', 'Farm updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($farmId)
    {
        DB::table('farms')->where('id', $farmId)->delete();

        return redirect()->back()->with('success', 'Farm deleted successfully');
    }
}
