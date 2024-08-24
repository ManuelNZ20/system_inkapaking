<?php if (isset($_GET['error']) && $_GET['error'] == 'email_exists'): ?>
          <div class="alert alert-danger" role="alert">
              El correo ya está en uso. Por favor, intenta con otro.
          </div>
<?php endif; ?>