<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <div class="container main">
        <h2>Все игроки</h2>

        <?php if (!empty($player) && is_array($player)) : ?>

            <?php foreach ($player as $item): ?>

                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center">
                            <img height="150" src="https://www.flaticon.com/svg/static/icons/svg/163/163801.svg" class="card-img" alt="<?= esc($item['FIO']); ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($item['FIO']); ?></h5>
                                <p class="card-text"><?= esc($item['Amplua']); ?></p>
                                <a href="<?= base_url()?>/index.php/player/view/<?= esc($item['id']); ?>" class="btn btn-primary">Просмотреть</a>

                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Невозможно найти рейтинги.</p>
        <?php endif ?>
    </div>
<?= $this->endSection() ?>