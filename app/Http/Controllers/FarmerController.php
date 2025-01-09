<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        $farmer = Farmer::create($request->farmer);

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

    public function update(Request $request, Farmer $farmer)
    {
        $farmer->update($request->farmer);

        return view('farmers.edit', compact('farmer'));
    }

    public function destroy($farmerId)
    {
        DB::table('farmers')
            ->where('id', $farmerId)
            ->delete();

        $farmers = Farmer::paginate(10);

        return view('farmers.index', compact('farmers'));
    }
}
