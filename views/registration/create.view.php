<?php require basePath('views/partials/head.php')?>

<nav id="nav">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/login">Login</a></li>
    </ul>
</nav>

<div class="form-container">
    <h2>Register Account</h2>
    <form action="/register" method="post">
        <div class="form-div">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter a valid email Address" required>
        </div>
        <div class="form-div">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password must be 8 characters long" required>
        </div>
        <div class="button-center">
            <input type="submit" value="Register">
        </div>
    </form>
</div>

<?php require basePath('views/partials/footer.php')?>