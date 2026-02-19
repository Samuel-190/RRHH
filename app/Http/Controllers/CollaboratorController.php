<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function store(Request $request)
    {
        $collaborator = Collaborator::create($request->all());

        return response()->json($collaborator, 201);
    }
}

