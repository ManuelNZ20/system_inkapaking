<?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials'): ?>
        <div class="alert alert-danger" role="alert">
            Credenciales incorrectas. Por favor, intenta nuevamente.
        </div>
<?php endif; ?>