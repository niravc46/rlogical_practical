<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('batches');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * fetch betches list.
     */
    public function batchList()
    {
        $data = Batch::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'module1_start' => Carbon::createFromFormat('d/m/Y', $request->module1_start)->format('Y-m-d'),
            'module1_end' => Carbon::createFromFormat('m/d/Y', $request->module1_end)->format('Y-m-d'),
            'module2_start' => Carbon::createFromFormat('d/m/Y', $request->module2_start)->format('Y-m-d'),
            'module2_end' => Carbon::createFromFormat('m/d/Y', $request->module2_end)->format('Y-m-d'),
            'module3_start' => Carbon::createFromFormat('d/m/Y', $request->module3_start)->format('Y-m-d'),
            'module3_end' => Carbon::createFromFormat('m/d/Y', $request->module3_end)->format('Y-m-d'),
            'module4_start' => Carbon::createFromFormat('d/m/Y', $request->module4_start)->format('Y-m-d'),
            'module4_end' => Carbon::createFromFormat('m/d/Y', $request->module4_end)->format('Y-m-d'),
        ]);

        $validated = $request->validate([
            'batch_name' => 'required|string|max:255',
            'module1_start' => 'required|date|before_or_equal:module1_end',
            'module1_end' => 'required|date',
            'module2_start' => 'required|date|after:module1_end|before_or_equal:module2_end',
            'module2_end' => 'required|date',
            'module3_start' => 'required|date|after:module2_end|before_or_equal:module3_end',
            'module3_end' => 'required|date',
            'module4_start' => 'required|date|after:module3_end|before_or_equal:module4_end',
            'module4_end' => 'required|date',
        ]);
        Batch::create($validated);
        return response()->json(['message' => 'Batch created successfully!', 'redirect' => route('batches.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $batch = Batch::findOrFail($id); // Fetch batch by ID
        return view('batches.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBatchRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        //
    }
}
