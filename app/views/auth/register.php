<?php $error = $error ?? NULL; ?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Register - Product Manager</title><link rel="stylesheet" href="<?= base_url('assets/style.css') ?>"></head>
<body>
<main class="card narrow">
    <h1>Product Manager</h1>
    <h2>Create account</h2>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
    <form method="post" action="<?= base_url('register') ?>">
        <label>Username<input type="text" name="username" required></label>
        <label>Email<input type="email" name="email" required></label>
        <label>Password<input type="password" name="password" minlength="6" required></label>
        <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="<?= base_url('login') ?>">Login</a></p>
</main>
</body>
</html>
