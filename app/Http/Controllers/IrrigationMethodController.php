<?php

namespace App\Http\Controllers;

use App\Models\IrrigationMethod;
use Illuminate\Http\Request;
use App\Http\Requests\IrrigationMethodRequest;

class IrrigationMethodController extends Controller
{
    public function index()
    {
        $irrigationMethods = IrrigationMethod::paginate(10);

        return view('irrigation_methods.index', compact('irrigationMethods'));
    }

    public function create()
    {
        return view('irrigation_methods.create');
    }

    public function store(IrrigationMethodRequest $request)
    {
        $irrigationMethod = IrrigationMethod::create($request->validated());

        return redirect()->back()->with([
            'success' => 'Irrigation method created successfully',
            'cta' => ['message' => 'See it here', 'link' => route('irrigation_methods.edit', $irrigationMethod)],
        ]);
    }

    public function show(IrrigationMethod $irrigationMethod)
    {
        return view('irrigation_methods.show', compact('irrigationMethod'));
    }

    public function edit(IrrigationMethod $irrigationMethod)
    {
        return view('irrigation_methods.edit', compact('irrigationMethod'));
    }

    public function update(IrrigationMethodRequest $request, IrrigationMethod $irrigationMethod)
    {
        $irrigationMethod->update($request->validated());

        return redirect()->back()->with('success', 'Irrigation method updated successfully');
    }

    public function destroy($irrigationMethodId)
    {
        IrrigationMethod::destroy($irrigationMethodId);

        return redirect()->back()->with('success', 'Irrigation method deleted successfully');
    }
}
