<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FarmerRequest;

class FarmerController extends Controller
{
    public function index()
    {
        $farmers = Farmer::paginate(10);

        return view('farmers.index', compact('farmers'));
    }

    public function create()
    {
        return view('farmers.create');
    }

    public function store(FarmerRequest $request)
    {
        $farmer = Farmer::create($request->validated());

        $request->session()->flash('success', 'Farmer created successfully');

        return view('farmers.edit', compact('farmer'));
    }

    public function show(Farmer $farmer)
    {
        return view('farmers.show', compact('farmer'));
    }

    public function edit(Farmer $farmer)
    {
        return view('farmers.edit', compact('farmer'));
    }

    public function update(FarmerRequest $request, Farmer $farmer)
    {
        $farmer->update($request->validated());

        request()->session()->flash('success', 'Farmer updated successfully');

        return redirect()->back();
    }

    public function destroy($farmerId)
    {
        DB::table('farmers')
            ->where('id', $farmerId)
            ->delete();

        request()->session()->flash('success', 'Farmer deleted successfully');

        $farmers = Farmer::paginate(10);

        return view('farmers.index', compact('farmers'));
    }
}
