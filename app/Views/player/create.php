<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

    <div class="container" style="max-width: 540px;">

        <?= form_open_multipart('player/store'); ?>
<!--        <input type="hidden" name="id" value="--><?//= $player["id"] ?><!--">-->

        <div class="form-group">
            <label for="FIO">ФИО игрока</label>
            <input type="text" class="form-control <?= ($validation->hasError('FIO')) ? 'is-invalid' : ''; ?>" name="FIO">
            <div class="invalid-feedback">
                <?= $validation->getError('FIO') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Amplua">Роль в команде</label>
            <input type="text" class="form-control <?= ($validation->hasError('Amplua')) ? 'is-invalid' : ''; ?>" name="Amplua">
            <div class="invalid-feedback">
                <?= $validation->getError('Amplua') ?>
            </div>
        </div>
        <div class="form-group">
            <label for="Amplua">Команда игрока</label>
                      
            <select class="form-control" name="id_team" required="">
                <option value="1">Реал Мадрид</option>
                <option value="2">Манчестер Юнайтед</option>
                <option value="3">Ливерпуль</option>
                <option value="4">Бавария</option>
                <option value="5">ПСЖ</option>
                <option value="1">Реал Мадрид</option>
                <option value="2">Манчестер Юнайтед</option>
                <option value="3">Ливерпуль</option>
                <option value="4">Бавария</option>
                <option value="5">ПСЖ</option>
                <option value="6">Атлетико М</option>
                <option value="7">Ювентус</option>
                <option value="8">Спартак Москва</option>
                <option value="9">Зенит</option>
                <option value="10">Интер Милан</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="birthday">Изображение</label>
            <input type="file" class="form-control-file <?= ($validation->hasError('picture')) ? 'is-invalid' : ''; ?>" name="picture">
            <div class="invalid-feedback">
                <?= $validation->getError('picture') ?>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Сохранить</button>
        </div>
        </form>
    </div>
<?= $this->endSection() ?>
