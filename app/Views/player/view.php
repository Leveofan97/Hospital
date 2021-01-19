<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <div class="container main">
        <?php use CodeIgniter\I18n\Time; ?>
        <?php if (!empty($player)) : ?>
            <div class="card mb-3" style="max-width: 640px;">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <img height="150" src="https://www.flaticon.com/svg/static/icons/svg/163/163801.svg" class="card-img" alt="<?= esc($player['FIO']); ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">ФИО: <?= esc($player['FIO']); ?></h5>
                            <p class="card-text">Лечащий врач: <?= esc($player['id_team']); ?></p>
                            <p class="card-text">Диагноз: <?= esc($player['Diagnos']); ?></p>
                            <p class="card-text">Возраст: <?= esc($player['Age']); ?></p>
                            <p class="card-text">Пол: <?= esc($player['Sex']); ?></p>
                            <p class="card-text">Дата поступления: <?= esc($player['Arrived']); ?></p>
                            <p class="card-text">Дата выписки: <?= esc($player['Leftleave']); ?></p>
                            <p class="card-text">Симптомы: <?= esc($player['Simptoms']); ?></p>
                        </div>

                        <div style="
                             margin-left: 17px;
                             border-bottom-width: -;
                             margin-bottom: 27px;">
                            <a class="btn btn-primary" href="<?= base_url()?>/player/edit/<?= esc($player['id']); ?>" class="btn btn-primary">Редактировать</a
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <p>Рейтинг не найден.</p>
        <?php endif ?>
    </div>
<?= $this->endSection() ?>