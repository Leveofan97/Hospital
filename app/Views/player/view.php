<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <div class="container main">
        <?php use CodeIgniter\I18n\Time; ?>
        <?php if (!empty($player)) : ?>
            <div class="card mb-3" style="max-width: 640px;">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <img style="
  display: block;
  max-width:180px;
  max-height:200px;
  width: auto;
  height: auto;
  padding-left: 10%;" src="<?= esc($player['picture_url']); ?>" class="card-img" alt="<?= esc($player['FIO']); ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">ФИО: <?= esc($player['FIO']); ?></h5>
                            <p class="card-text">Команда: <?php if($player['id_team'] == 1) echo("Реал Мадрид");
                                    if($player['id_team'] == 2) echo("Манчестер Юнайтед");
                                    if($player['id_team'] == 3) echo("Ливерпуль");
                                    if($player['id_team'] == 4) echo("Бавария");
                                    if($player['id_team'] == 5) echo("ПСЖ");
                                    if($player['id_team'] == 6) echo("Атлетико М");
                                    if($player['id_team'] == 7) echo("Ювентус");
                                    if($player['id_team'] == 8) echo("Спартак Москва");
                                    if($player['id_team'] == 9) echo("Зенит");
                                    if($player['id_team'] == 10) echo("Интер Милан");
                              ?></p>
                            <p class="card-text">Роль в команде: <?= esc($player['Amplua']); ?></p>
                        </div>

                        <div style="
                             margin-left: 17px;
                             border-bottom-width: -;
                             margin-bottom: 27px;">
                            <a class="btn btn-primary" href="<?= base_url()?>/player/edit/<?= esc($player['id']); ?>" class="btn btn-primary">Редактировать</a
                        </div>
                        <div style="
                             margin-top: 5px;">
                            <a class="btn btn-danger" href="<?= base_url()?>/player/delete/<?= esc($player['id']); ?>" class="btn btn-primary">Удалить</a
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <p>Рейтинг не найден.</p>
        <?php endif ?>
    </div>
<?= $this->endSection() ?>
