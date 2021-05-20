<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <div class="jumbotron text-center">
        <img class="mb-2" src="https://w7.pngwing.com/pngs/205/64/png-transparent-football-manager-handheld-football-manager-mobile-2018-paris-saint-germain-f-c-game-logo-others-game-logo-paris-saintgermain-fc.png" alt="" width="90" height="90"><h1 class="display-4">Football Online</h1>
        <p class="lead">Приложения футбольных команд.</p>      
         <?php if ($ionAuth->isAdmin()): ?>
                        <a class="btn btn-primary btn-lg" role="button" href="<?= base_url()?>/player/viewAllWithUsers">Управление игроками</a>
                    <?php endif ?>
        <?php if ($ionAuth->isAdmin() == null): ?>
                        <a class="btn btn-primary btn-lg" role="button" href="<?= base_url()?>/player">Игроки</a>
                    <?php endif ?>
    </div>
<?= $this->endSection() ?>
