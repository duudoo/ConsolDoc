<div>
    <h5>Sign Contract</h5>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <canvas id="signatureCanvas" width="400" height="150" style="border:1px solid #000;"></canvas>
    <br>
    <button wire:click="save" class="btn btn-primary mt-2">Save Signature</button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const canvas = document.getElementById('signatureCanvas');
            const ctx = canvas.getContext('2d');
            let drawing = false;

            canvas.addEventListener('mousedown', () => drawing = true);
            canvas.addEventListener('mouseup', () => {
                drawing = false;
                window.livewire.find('{{ $this->id }}').signatureData = canvas.toDataURL();
            });
            canvas.addEventListener('mousemove', draw);

            function draw(e) {
                if (!drawing) return;
                ctx.lineWidth = 2;
                ctx.lineCap = 'round';
                ctx.strokeStyle = '#000';

                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
                ctx.beginPath();
                ctx.moveTo(e.offsetX, e.offsetY);
            }
        });
    </script>
</div>
