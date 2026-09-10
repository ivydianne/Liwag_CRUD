<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Products - Product Manager</title><link rel="stylesheet" href="<?= base_url('assets/style.css') ?>"></head>
<body>
<main class="container">
    <header class="topbar"><div><span class="eyebrow">INVENTORY CONTROL</span><h1>Products</h1><p class="subtitle">Welcome back, <?= htmlspecialchars((string) $username, ENT_QUOTES, 'UTF-8') ?>.</p></div><a class="button secondary" href="<?= base_url('logout') ?>" onclick="return confirm('Are you sure you want to log out?')">Logout</a></header>
    <?php if (!empty($success)): ?><div class="notice success"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    <a class="button" href="<?= base_url('products/create') ?>">+ Add product</a>
    <?php if (empty($products)): ?>
        <p class="empty">No products have been added yet.</p>
    <?php else: ?>
    <div class="table-wrap"><table><thead><tr><th>Product</th><th>Description</th><th>Price</th><th>Quantity</th><th>Created</th><th>Actions</th></tr></thead><tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= nl2br(htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8')) ?></td>
            <td><?= number_format((float) $product['price'], 2) ?></td>
            <td><?= (int) $product['quantity'] ?></td>
            <td><?= htmlspecialchars($product['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
            <td class="actions"><a href="<?= base_url('products/edit/' . (int) $product['id']) ?>">Edit</a> <a class="danger-link" href="<?= base_url('products/delete/' . (int) $product['id']) ?>" onclick="return confirm('Delete this product permanently?')">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody></table></div>
    <?php endif; ?>
</main>
</body>
</html>
