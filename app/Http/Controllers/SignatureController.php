<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignatureController extends Controller
{
    public function index($id)
    {
        $contract = Contract::findOrFail($id);
        $signatures = Signature::where('contract_id', $id)->with('user')->get();
        $signed = $signatures->where('user_id', Auth::id())->where('status', 'signed')->first();

        return view('signatures.index', compact('contract', 'signatures', 'signed'));
    }

    public function sign($id)
    {
        Signature::updateOrCreate(
            ['contract_id' => $id, 'user_id' => Auth::id()],
            ['status' => 'signed', 'signed_at' => now()]
        );

        return redirect()->route('contracts.signatures', $id);
    }
}