<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::where('team_id', Auth::user()->currentTeam->id)->get();
        return view('pages.contracts.index', compact('contracts'));
    }

    public function create()
    {
        return view('pages.contracts.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Contract::create([
            'title' => $request->title,
            'team_id' => Auth::user()->currentTeam->id,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('contracts.index');
    }

    public function show(Contract $contract)
    {
        return view('pages.contracts.show', compact('contract'));
    }
}
