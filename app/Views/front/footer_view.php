<footer class="footer">
    <div class="container text-center py-3">
        <h4>Síguenos en nuestras redes sociales:</h4>
        <div class="d-flex justify-content-center">
            <!-- Ícono de Facebook -->
            <a href="https://www.facebook.com" class="text-white mx-3" target="_blank">
                <img src="<?= base_url('assets/img/facebook.png') ?>" alt="Icono de Facebook" style="width: 32px; height: 32px;">
            </a>
            <!-- Ícono de Twitter -->
            <a href="https://www.twitter.com" class="text-white mx-3" target="_blank">
                <img src="<?= base_url('assets/img/twieee.png') ?>" alt="Icono de Twitter" style="width: 32px; height: 32px;">
            </a>
            <!-- Ícono de Instagram -->
            <a href="https://www.instagram.com" class="text-white mx-3" target="_blank">
                <img src="<?= base_url('assets/img/instagram_icon_264992.webp') ?>" alt="Icono de instagram" style="width: 32px; height: 32px;">
            </a>
            <!-- Ícono de github -->
            <a href="https://www.github.com" class="text-white mx-3" target="_blank">
                <img src="<?= base_url('assets/img/github.png') ?>" alt="Icono de instagram" style="width: 32px; height: 32px;">
            </a>
            <!-- Ícono de whatsapp-->
            <a href="https://www.whatsapp.com" class="text-white mx-3" target="_blank">
                <img src="<?= base_url('assets/img/whatsapp1.png') ?>" alt="Icono de instagram" style="width: 32px; height: 32px;">
            </a>
        </div>
    </div>
</footer>
<script>
    //script AJAX
    function actualizarCarrito(accion, rowid) {
        fetch(`<?= base_url('Carrito_controller') ?>${accion}/${rowid}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log('Carrito actualizado', data.cart);

                    // Actualizar cantidad en la vista
                    document.getElementById(`cantidad-${rowid}`).innerText = data.cart[rowid]['qty'];

                    // Opcional: Actualizar el total
                    document.getElementById('gran-total').innerText = `$ ${data.total.toFixed(2)}`;
                }
            })
            .catch(error => console.error('Error al actualizar el carrito:', error));
    }
</script>
</body>

</html>