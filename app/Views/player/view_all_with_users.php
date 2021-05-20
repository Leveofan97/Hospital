<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <div class="container main">
        <?php if (!empty($player) && is_array($player)) : ?>
            <h2>Все рейтинги:</h2>
            <div class="d-flex mb-2">
                <?= $pager->links('group1','my_page') ?>
                <?= form_open('player/viewAllWithUsers', ['style' => 'display: flex']); ?>
                <select name="per_page" class="ml-3" aria-label="per_page">
                    <option value="2" <?php if($per_page == '2') echo("selected"); ?>>2</option>
                    <option value="5"  <?php if($per_page == '5') echo("selected"); ?>>5</option>
                    <option value="10" <?php if($per_page == '10') echo("selected"); ?>>10</option>
                    <option value="20" <?php if($per_page == '20') echo("selected"); ?>>20</option>
                </select>
                <button class="btn btn-outline-success" type="submit" class="btn btn-primary">На странице</button>
                </form>
                <?= form_open('player/viewAllWithUsers',['style' => 'display: flex']); ?>
                <input type="text" class="form-control ml-3" name="search" placeholder="Роль в команде или email" aria-label="Search"
                       value="<?= $search; ?>">
                <button class="btn btn-outline-success" type="submit" class="btn btn-primary">Найти</button>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                <th scope="col">Аватар</th>
                <th scope="col">Имя</th>
                <th scope="col">Email создателя</th>
                <th scope="col">Команда игрока</th>
                <th scope="col">Роль в команде</th>
                <th scope="col">Управление</th>

                </thead>
                <tbody>
                <?php foreach ($player as $item): ?>
                    <tr>
                        <td>
                            <img height="200" src="<?= esc($item['picture_url']); ?>" alt="<?= esc($item['FIO']); ?>">
                        </td>
                        <td><?= esc($item['FIO']); ?></td>
                        <td><?= esc($item['email']); ?></td>
                        <td>  <?php if($item['id_team'] == 1) ?> Aboba</td>
                        <td><?= esc($item['Amplua']); ?></td>
                        <td>
                            <a href="<?= base_url()?>/player/view/<?= esc($item['id']); ?>" class="btn btn-primary btn-sm">Просмотреть</a>
                            <a href="<?= base_url()?>/player/edit/<?= esc($item['id']); ?>" class="btn btn-warning btn-sm">Редактировать</a>
                            <a href="<?= base_url()?>/player/delete/<?= esc($item['id']); ?>" class="btn btn-danger btn-sm">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        <?php else : ?>
            <div class="text-center">
                <p>Рейтинги не найдены </p>
                <a class="btn btn-primary btn-lg" href="<?= base_url()?>/player/create"><span class="fas fa-tachometer-alt" style="color:white"></span>&nbsp;&nbsp;Создать рейтинг</a>
            </div>
        <?php endif ?>
    </div>
<?= $this->endSection() ?>
