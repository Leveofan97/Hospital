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
            <input type="text" class="form-control <?= ($validation->hasError('id_team')) ? 'is-invalid' : ''; ?>" name="id_team">
            <div class="invalid-feedback">
                <?= $validation->getError('id_team') ?>
            </div>
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
