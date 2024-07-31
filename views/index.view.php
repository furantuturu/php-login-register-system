<?php require 'partials/head.php'?>

<nav id="nav">
    <ul>
        <li><a href="/">Home</a></li>
        <?php if (empty($_SESSION['user'])) : ?>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>

<header id="header">
    <h1>Hey!</h1>
    <p>Welcome to my website, netizen!<br />
    You're free to try out my own Login and Register system.</p>
</header>

<?php if (isset($_SESSION['user'])) : ?>
    <header id="header">
        <p>You seem to be logged in,<br />
        You can logout on dashboard page.</p>
    </header>
    <span>
        <a href="/dashboard"><input type="button" value="Dashboard" /></a>
    </span>
<?php else : ?>
    <span>
        <a href="/register"><input type="button" value="Register" /></a>
    </span>
<?php endif; ?>

<?php require 'partials/footer.php'?>
