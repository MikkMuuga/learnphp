<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
    <h2>Users</h2>
    <table class="table table-striped table-hover mt-3">
        <thead>
            <th>ID</th>
            <th>Email</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-warning" href="/users/edit?id=<?=$user->id?>">Edit</a>
                            <a class="btn btn-danger" href="/users/delete?id=<?=$user->id?>">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>* use <a href="/register">registration form</a>.</p>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>