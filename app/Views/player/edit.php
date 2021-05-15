<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

    <div class="container" style="max-width: 540px;">

        <?= form_open_multipart('player/update'); ?>
        <input type="hidden" name="id" value="<?= $player["id"] ?>">

        <div class="form-group">
            <label for="id_team">Врач</label>
            <input type="text" class="form-control <?= ($validation->hasError('id_team')) ? 'is-invalid' : ''; ?>" name="id_team"
                   value="<?= $player["id_team"]; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('id_team') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">ФИО</label>
            <input type="text" class="form-control <?= ($validation->hasError('FIO')) ? 'is-invalid' : ''; ?>" name="FIO"
                   value="<?= $player["FIO"]; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('FIO') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Диагноз</label>
            <input type="text" class="form-control <?= ($validation->hasError('Amplua')) ? 'is-invalid' : ''; ?>" name="Amplua"
                   value="<?= $player["Amplua"] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('Amplua') ?>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Сохранить</button>
        </div>
        </form>
    </div>
<?= $this->endSection() ?>