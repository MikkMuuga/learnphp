<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container mx-auto px-4 py-8">
    <form action="/posts/edit?id=<?=$post->id?>" method="POST" class="space-y-4">
        <div class="form-control w-full">
            <label for="title" class="label">
                <span class="label-text">Title</span>
            </label>
            <input 
                value="<?=$post->title?>" 
                name="title" 
                type="text" 
                class="input input-bordered w-full" 
                id="title" 
                placeholder="Title"
            >
        </div>
        <div class="form-control w-full">
            <label for="body" class="label">
                <span class="label-text">Content</span>
            </label>
            <textarea 
                name="body" 
                class="textarea textarea-bordered h-64" 
                id="body" 
                placeholder="Content"
            ><?=$post->body?></textarea>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>