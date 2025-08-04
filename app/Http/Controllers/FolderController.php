<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function index() {
        $folders = Folder::where('team_id', Auth::user()->currentTeam->id)->get();
        return view('folders.index', compact('folders'));
    }

    public function create() {
        return view('folders.create');
    }

    public function store(Request $request) {
        Folder::create([
            'name' => $request->name,
            'team_id' => Auth::user()->currentTeam->id
        ]);
        return redirect()->route('folders.index');
    }

    public function show(Folder $folder) {
        return view('folders.show', compact('folder'));
    }
}