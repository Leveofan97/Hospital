<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <div class="jumbotron text-center">
        <img class="mb-4" src="https://www.flaticon.com/svg/static/icons/svg/1379/1379505.svg" alt="" width="72" height="72"><h1 class="display-4">Hospital Online</h1>
        <p class="lead">Приложения для учета больных.</p>
        <a class="btn btn-primary btn-lg" href="auth/login" role="button">Войти</a>
    </div>
<?= $this->endSection() ?>