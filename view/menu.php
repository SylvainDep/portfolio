<?php ob_start(); ?>

<nav>
    <img src="/public/img/logo.png" />
    <ul>
        <li>Home</li>
        <li>About</li>
        <li>Services</li>
        <li>Contact</li>
        <li>Hire me</li>
    </ul>
</nav>

<?php $nav = ob_get_clean(); ?>