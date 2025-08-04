<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractDraftController extends Controller
{
    public function edit($id) {
        $contract = Contract::findOrFail($id);
        return view('contracts.draft', compact('contract'));
    }

    public function updateDraft(Request $request, $id) {
        $contract = Contract::findOrFail($id);
        $contract->update(['body' => $request->body]);
        return redirect()->route('contracts.show', $contract);
    }

    public function diff($id) {
        $contract = Contract::findOrFail($id);
        $old = $contract->body_versions()->orderByDesc('created_at')->skip(1)->first()->body ?? '';
        $new = $contract->body;
        return view('contracts.diff', compact('contract', 'old', 'new'));
    }
}