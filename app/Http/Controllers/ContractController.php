<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller {

    public function store(Request $request) {

        $request->validate([
            'collaborator_id' => 'required|exists:collaborators,id',
            'contract_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'position' => 'required|string',
            'salary' => 'required|numeric|min:0',
            'status' => 'required'
        ]);

        Contract::create($request->all());

        return redirect()->back();
    }

    public function update(Request $request, $id) {

        $request->validate([
            'collaborator_id' => 'required|exists:collaborators,id',
            'contract_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'position' => 'required|string',
            'salary' => 'required|numeric|min:0',
            'status' => 'required'
        ]);

        $contract = \App\Models\Contract::findOrFail($id);

        $contract->update($request->all());

        return redirect()->back();
    }
}
