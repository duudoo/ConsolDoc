<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\AISetting;
use Illuminate\Support\Facades\Auth;

class ClauseSuggestionService
{
    public function suggestClauses(string \$ocrText): array
    {
        \$setting = AISetting::where('team_id', Auth::user()->currentTeam->id)->first();
        \$apiKey = \$setting->openai_api_key ?? null;

        if (!\$apiKey) {
            throw new \Exception("No OpenAI API key found for team.");
        }

        \$prompt = "You are a legal contract assistant. Read the following OCR text and return a JSON list of clauses found, in this format:
[
  {"clause": "Termination", "start": 120, "end": 250},
  {"clause": "Governing Law", "start": 420, "end": 550}
]

OCR Text:
"""\n\$ocrText\n"""
";

        \$response = Http::withToken(\$apiKey)->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'system', 'content' => 'You classify contract clauses from OCR text.'],
                ['role' => 'user', 'content' => \$prompt],
            ],
            'temperature' => 0.2,
        ]);

        if (!\$response->ok()) {
            throw new \Exception("OpenAI error: " . \$response->body());
        }

        \$content = \$response->json('choices.0.message.content');

        return json_decode(\$content, true);
    }
}
