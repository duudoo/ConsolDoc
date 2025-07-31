<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignatureController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'signature_data' => 'required|string',
        ]);

        $signature = Signature::create([
            'contract_id' => $request->input('contract_id'),
            'user_id' => Auth::id(),
            'signature_data' => $request->input('signature_data'),
            'signed_at' => now(),
        ]);

        return response()->json(['message' => 'Signature saved', 'signature' => $signature], 201);
    }
}
