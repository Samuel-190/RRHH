<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractExtension;
use App\Models\Contract;

class ContractExtensionController extends Controller
{
    public function store(Request $request, $id) {

        $contract = Contract::findOrFail($id);

        if (in_array($contract->status, ['Terminado', 'Finalizado'])) {
            abort(403);
        }

        if (!in_array($contract->contract_type, ['Fijo','Prestación de Servicios'])) {
            abort(403);
        }

        $extension = ContractExtension::create([
            'contract_id' => $contract->id,
            'extension_type' => $request->extension_type,
            'new_end_date' => $request->new_end_date,
            'additional_value' => $request->additional_value,
            'description' => $request->description
        ]);

        if ($extension->extension_type === 'Tiempo') {
            $contract->end_date = $extension->new_end_date;
            $contract->save();
        }

        return redirect()->back();
    }
}
