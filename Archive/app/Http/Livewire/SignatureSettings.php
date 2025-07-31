<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SignaturePreference;
use Illuminate\Support\Facades\Auth;

class SignatureSettings extends Component
{
    public $method;
    public $apiKey;
    public $webhookUrl;
    public $configData;

    public function mount()
    {
        $team = Auth::user()->currentTeam;
        $prefs = SignaturePreference::firstOrCreate(['team_id' => $team->id]);

        $this->method = $prefs->method;
        $this->apiKey = $prefs->api_key;
        $this->webhookUrl = $prefs->webhook_url;
        $this->configData = $prefs->config_data;
    }

    public function save()
    {
        $team = Auth::user()->currentTeam;
        SignaturePreference::updateOrCreate(
            ['team_id' => $team->id],
            [
                'method' => $this->method,
                'api_key' => $this->apiKey,
                'webhook_url' => $this->webhookUrl,
                'config_data' => $this->configData,
            ]
        );
        session()->flash('message', 'Signature settings saved!');
    }

    public function render()
    {
        return view('livewire.signature-settings');
    }
}
