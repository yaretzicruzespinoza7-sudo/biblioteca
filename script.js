document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formLibro');

    // Comprueba los datos antes de enviar el formulario
    form.addEventListener('submit', (e) => {
        const titulo = document.getElementById('titulo').value.trim();
        const autor = document.getElementById('autor').value.trim();
        const isbn = document.getElementById('isbn').value.trim();

        if (titulo === "" || autor === "" || isbn === "") {
            e.preventDefault(); // Evita que se envíe el formulario
            alert('Por favor, rellena todos los campos antes de guardar.');

            return;
        }

        // Verifica que el ISBN tenga una longitud mínima
        if (isbn.length < 10) {
            e.preventDefault();
            alert('El campo ISBN parece demasiado corto o inválido.');
        }
    });

    // Comprueba si el registro se realizó correctamente
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('success') === '1') {
  
        window.history.replaceState({}, document.title, window.location.pathname);
        alert('¡Libro registrado con éxito en el inventario!');
    }
});
