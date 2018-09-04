<?php ob_start(); ?>

<nav>
    <img src="/public/img/logo.png" />
    <ul>
        <li>
            <a href="<?= $_SERVER['REQUEST_URI'] . '/#body' ?>">Home</a>
        </li>
        <li>
            <a href="<?= $_SERVER['REQUEST_URI'] . '/#about' ?>">About</a>
        </li>
        <li>
            <a href="<?= $_SERVER['REQUEST_URI'] . '/#expertise' ?>">Services</a>
        </li>
        <li>
            <a href="<?= $_SERVER['REQUEST_URI'] . '/#works' ?>">Works</a>
        </li>
        <li>
            <a href="<?= $_SERVER['REQUEST_URI'] . '/#contact' ?>">Contact</a>
        </li>
        <li>
            <a href="<?= $_SERVER['REQUEST_URI'] . '/#contact' ?>">Hire me</a>
        </li>
    </ul>
</nav>

<?php $nav = ob_get_clean(); ?>