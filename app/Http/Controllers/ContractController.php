<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\ContractTermination;

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

    public function terminate(Request $request, $id) {

        $contract = Contract::findOrFail($id);

        if (in_array($contract->status, ['Terminado', 'Finalizado'])) {
            abort(403);
        }

        ContractTermination::create([
            'contract_id' => $contract->id, 
            'termination_date' => $request->termination_date,
            'reason' => $request->termination_reason,
        ]);

        $contract->status = 'Terminado';
        $contract->save();

        return redirect()->back();
    }
}
