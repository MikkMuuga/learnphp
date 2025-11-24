<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
   <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <th>ID</th>
                <td><?=$post->id?></td>
            </tr>
            <tr>
                <th>Title</th>
                <td><?=$post->title?></td>
            </tr>
            <tr>
                <th>Author</th>
                <td><?= $post->author->email ?? '-' ?></td>
            </tr>
            <tr>
                <th>Content</th>
                <td><?=$post->body?></td>
            </tr>
        </tbody>
   </table>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>