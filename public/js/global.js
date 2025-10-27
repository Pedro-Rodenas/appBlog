// Crear el elemento
const cursorAura = document.createElement('div');
cursorAura.classList.add('cursor-aura');
document.body.appendChild(cursorAura);

// Actualizar posición del cursor
document.addEventListener('mousemove', e => {
    cursorAura.style.left = e.clientX + 'px';
    cursorAura.style.top = e.clientY + 'px';
});

// Animación al hacer click (aumenta el tamaño)
document.addEventListener('mousedown', () => {
    cursorAura.style.width = '60px';
    cursorAura.style.height = '60px';
    cursorAura.style.borderColor = 'rgba(0, 150, 255, 0.8)';
});

document.addEventListener('mouseup', () => {
    cursorAura.style.width = '40px';
    cursorAura.style.height = '40px';
    cursorAura.style.borderColor = 'rgba(0, 150, 255, 0.5)';
});
