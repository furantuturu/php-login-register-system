<?php require basePath('views/partials/head.php')?>

<nav id="nav">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/register">Register</a></li>
    </ul>
</nav>

<div class="form-container">
    <h2>Login</h1>
    <form action="/login" method="post">
        <div class="form-div">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= old('email') ?>" placeholder="Email Address" required>
        </div>
        <div class="form-div">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="button-center">
            <input type="submit" value="Login">
        </div>
    </form>
</div>

<?php require basePath('views/partials/footer.php')?>