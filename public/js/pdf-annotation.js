document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('pdf-canvas');
    const overlay = document.getElementById('pdf-annotation-overlay');
    if (!canvas || !overlay) return;

    overlay.style.width = canvas.offsetWidth + 'px';
    overlay.style.height = canvas.offsetHeight + 'px';

    canvas.addEventListener('click', function (e) {
        const rect = canvas.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const page = parseInt(canvas.dataset.page || 1);

        const clauseType = prompt('Clause Type:');
        const comment = prompt('Comment:');

        Livewire.emit('createAnnotation', {
            page: page,
            x: x,
            y: y,
            width: 150,
            height: 50,
            clause_type: clauseType,
            comment: comment
        });
    });
});