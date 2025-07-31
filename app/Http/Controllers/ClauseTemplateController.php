<?php

namespace App\Http\Controllers;

use App\Models\ClauseTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClauseTemplateController extends Controller
{
    public function index() {
        $templates = ClauseTemplate::where('team_id', Auth::user()->currentTeam->id)->get();
        return view('clause-templates.index', compact('templates'));
    }

    public function create() {
        return view('clause-templates.create');
    }

    public function store(Request $request) {
        ClauseTemplate::create([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $request->content,
            'team_id' => Auth::user()->currentTeam->id
        ]);
        return redirect()->route('clause-templates.index');
    }

    public function edit(ClauseTemplate $template) {
        return view('clause-templates.edit', compact('template'));
    }

    public function update(Request $request, ClauseTemplate $template) {
        $template->update($request->only('title', 'type', 'content'));
        return redirect()->route('clause-templates.index');
    }

    public function destroy(ClauseTemplate $template) {
        $template->delete();
        return redirect()->route('clause-templates.index');
    }
}