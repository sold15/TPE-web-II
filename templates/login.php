<?php 
require 'templates/header.php'; ?>
<?php require_once 'auth.helpers.php'; ?>

<div class="mt-5 w-25 mx-auto">
    <form method="POST" action="auth">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" required class="form-control" id="password" name="password">
        </div>

        <?php if ($error) : ?>
            <div class='alert alert-danger' role='alert'>
                <?= $error ?>
            </div> 
        <?php endif ?>
       
        <button type="submit" class="btn btn-primary mt-3">Entrar</button>
    </form>
</div>

<?php require 'templates/footer.phtml' ?>