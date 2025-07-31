<div>
    <h4 class="mb-3">AI API Key Settings</h4>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="mb-3">
        <label for="openai_api_key" class="form-label">OpenAI API Key</label>
        <input type="text" id="openai_api_key" wire:model.defer="openai_api_key" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="claude_api_key" class="form-label">Anthropic Claude API Key</label>
        <input type="text" id="claude_api_key" wire:model.defer="claude_api_key" class="form-control" />
    </div>

    <button wire:click="save" class="btn btn-primary">Save API Keys</button>
</div>
