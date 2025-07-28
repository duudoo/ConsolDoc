# ConsolDoc

AI-powered contract and document intelligence platform for managing, annotating, and collaborating on legal documents.

---

## 🚀 Features

- 📑 Document Upload & PDF Viewer
- 🧾 Clause Highlighting & Annotation
- 🧠 AI Clause Detection (OpenAI / Claude)
- 🤖 Contract Chatbot (coming)
- 🔐 E-signature (in-app or 3rd-party)
- 👥 Team Management (Jetstream)
- 🔁 Approval Workflows
- 🔎 Full OCR (Google Document AI)
- 🌐 Webhooks + External Signing APIs
- 🧱 Clause Templates & Reuse
- 🗂️ Folder & Version Control (in progress)

---

## 🔧 Local Setup

```bash
git clone https://github.com/duudoo/ConsolDoc.git
cd ConsolDoc
cp .env.example .env
composer install
npm install && npm run build
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

---

## 🧪 Test Data

The seeders include:
- Mock contract **"Mock NDA"**
- OCR content with:
  - “Termination” and “Governing Law” clauses
  - Pre-defined bounding boxes

To test clause AI:
1. Log in
2. Go to Mock NDA contract
3. Click **“🔍 Suggest Clauses with AI”**
4. See overlays, save as annotations

---

## ⚙️ AI Provider Settings

Go to `/settings/ai` to enter:
- OpenAI API Key
- Claude API Key

Settings are stored per team.

---

## 🐳 Docker (Optional)

See `docker-compose.prod.yml` and `nginx.conf` for deploying to DigitalOcean or other cloud.

---

## 📄 License

MIT – build commercial or internal tools on top of it.
