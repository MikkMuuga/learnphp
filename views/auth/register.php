<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container mx-auto px-4 py-8">
    <form action="/register" method="POST" class="space-y-4">
        <div class="form-control w-full">
            <label for="email" class="label">
                <span class="label-text">Email</span>
            </label>
            <input 
                name="email" 
                type="email" 
                class="input input-bordered w-full" 
                id="email" 
                placeholder="Email"
            >
        </div>
        <div class="form-control w-full">
            <label for="password" class="label">
                <span class="label-text">Password</span>
            </label>
            <input 
                name="password" 
                type="password" 
                class="input input-bordered w-full" 
                id="password" 
                placeholder="Password"
            >
        </div>
        <div class="form-control w-full">
            <label for="password_confirm" class="label">
                <span class="label-text">Password Confirm</span>
            </label>
            <input 
                name="password_confirm" 
                type="password" 
                class="input input-bordered w-full" 
                id="password_confirm" 
                placeholder="Confirm Password"
            >
        </div>
        <button class="btn btn-primary">Register</button>
    </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>