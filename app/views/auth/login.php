<?php $error = $error ?? NULL; ?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Login - Product Manager</title><link rel="stylesheet" href="<?= base_url('assets/style.css') ?>"></head>
<body>
<main class="card narrow">
    <span class="eyebrow">LIWAG CRUD</span>
    <h1>Product Manager</h1>
    <h2>Login</h2>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
    <form method="post" action="<?= base_url('login') ?>">
        <label>Username<input type="text" name="username" required></label>
        <label>Password<input type="password" name="password" required></label>
        <button type="submit">Login</button>
    </form>
</main>
</body>
</html>
