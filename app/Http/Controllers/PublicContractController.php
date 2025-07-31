<?php

namespace App\Http\Controllers;

use App\Models\PublicContractToken;
use Illuminate\Http\Request;

class PublicContractController extends Controller
{
    public function view($token)
    {
        $tokenEntry = PublicContractToken::where('token', $token)->firstOrFail();
        $contract = $tokenEntry->contract;

        return view('public.contract', compact('contract'));
    }
}