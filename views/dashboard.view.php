<?php require 'partials/head.php'?>

<nav id="nav">
    <ul>
        <li><a href="/">Home</a></li>
    </ul>
</nav>

<div class="dashboard-container">
    <h1>Congrats, <?= $user['email'] ?></h1>
    <h2>You're now logged in</h2>

    <form action="/logout" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Logout">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@tsparticles/preset-fireworks@3/tsparticles.preset.fireworks.bundle.min.js"></script>
<script>
    (async () => {
        await loadFireworksPreset(tsParticles);

        await tsParticles.load({
            id: "tsparticles",
            options: {
            preset: "fireworks",
            },
        });
    })();
</script>

</body>
</html>