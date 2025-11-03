<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
    <h2>Edit User</h2>
    <form action="/users/edit?id=<?= $user->id ?>" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" value="<?= $user->email ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <button class="btn btn-primary">Save</button>
        <a class="btn btn-secondary" href="/users">Cancel</a>
    </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>