<?php ob_start(); ?>

<nav>
    <img src="/public/img/logo.png" />
    <ul>
        <li>
            <a href="/#body">Home</a>
        </li>
        <li>
            <a href="/#about">About</a>
        </li>
        <li>
            <a href="/#expertises">Services</a>
        </li>
        <li>
            <a href="/#works">Works</a>
        </li>
        <li>
            <a href="/#contact">Contact</a>
        </li>
        <li>
            <a href="/#contact">Hire me</a>
        </li>
    </ul>
</nav>

<?php $nav = ob_get_clean(); ?>