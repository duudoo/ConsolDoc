<div>
    <h4 class="mb-3">Signature Method Settings</h4>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="mb-3">
        <label for="method" class="form-label">Signature Provider</label>
        <select id="method" class="form-select" wire:model="method">
            <option value="in_app">In-App Drawing</option>
            <option value="eversign">Eversign</option>
            <option value="signwell">SignWell</option>
            <option value="libresign">LibreSign</option>
            <option value="signserver">SignServer (Enterprise)</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="apiKey" class="form-label">API Key</label>
        <input type="text" id="apiKey" wire:model.defer="apiKey" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="webhookUrl" class="form-label">Webhook URL</label>
        <input type="text" id="webhookUrl" wire:model.defer="webhookUrl" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="configData" class="form-label">Extra Config (JSON)</label>
        <textarea id="configData" wire:model.defer="configData" class="form-control" rows="3"></textarea>
    </div>

    <button wire:click="save" class="btn btn-primary">Save Settings</button>
</div>
