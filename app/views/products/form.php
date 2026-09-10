<?php $product = $product ?? []; $error = $error ?? NULL; ?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title><?= htmlspecialchars($heading, ENT_QUOTES, 'UTF-8') ?></title><link rel="stylesheet" href="<?= base_url('assets/style.css') ?>"></head>
<body>
<main class="card narrow">
    <p><a class="back-link" href="<?= base_url('products') ?>">&larr; Back to products</a></p>
    <h1><?= htmlspecialchars($heading, ENT_QUOTES, 'UTF-8') ?></h1>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
    <form method="post" onsubmit="return confirm('Save these product changes?')">
        <label>Product name<input type="text" name="product_name" maxlength="100" value="<?= htmlspecialchars($product['product_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required></label>
        <label>Description<textarea name="description" rows="5"><?= htmlspecialchars($product['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea></label>
        <label>Price<input type="number" name="price" min="0" step="0.01" value="<?= htmlspecialchars($product['price'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required></label>
        <label>Quantity<input type="number" name="quantity" min="0" step="1" value="<?= htmlspecialchars($product['quantity'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required></label>
        <button type="submit">Save product</button>
    </form>
</main>
</body>
</html>
