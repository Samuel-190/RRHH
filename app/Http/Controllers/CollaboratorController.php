<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller {

    public function index() {

        $collaborators = Collaborator::all();
        return response()->json($collaborators, 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
           'document_type'   => 'required|string',
           'document_number' => 'required|string|unique:collaborators,document_number',
           'first_name'      => 'required|string',
           'last_name'       => 'required|string',
           'email'           => 'required|email',
           'phone_number'    => 'required|string',
           'address'         => 'required|string',
           'birth_date'      => 'required|date',
        ]);

        $collaborator = Collaborator::create($validated);

        return response()->json($collaborator, 201);
    }

    public function update(Request $request, Collaborator $collaborator) {

        $validated = $request->validate([
            'first_name'      => 'required|string',
            'last_name'       => 'required|string',
            'document_type'   => 'required|string',
            'document_number' => 'required|string|unique:collaborators,document_number,' . $collaborator->id,
            'birth_date'      => 'required|date',
            'email'           => 'required|email',
            'phone_number'    => 'required|string',
            'address'         => 'required|string',
        ]);

        $collaborator->update($validated);

        return redirect()->back();
    }

    public function destroy(Collaborator $collaborator) {
        
        $collaborator->delete();
        return response()->json(null, 204);
    }
}

