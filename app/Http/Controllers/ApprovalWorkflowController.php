<?php

namespace App\Http\Controllers;

use App\Models\ApprovalWorkflow;
use App\Models\Contract;
use Illuminate\Http\Request;

class ApprovalWorkflowController extends Controller
{
    public function index() {
        $workflows = ApprovalWorkflow::with('contract', 'steps')->get();
        return view('approval-workflows.index', compact('workflows'));
    }

    public function create() {
        $contracts = Contract::all();
        return view('approval-workflows.create', compact('contracts'));
    }

    public function store(Request $request) {
        $workflow = ApprovalWorkflow::create(['contract_id' => $request->contract_id]);

        foreach ($request->steps as $step) {
            $workflow->steps()->create([
                'approver_id' => $step['approver_id'],
                'order' => $step['order'],
                'role' => $step['role']
            ]);
        }

        return redirect()->route('approval-workflows.index');
    }
}