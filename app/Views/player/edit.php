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
            <input type="text" class="form-control <?= ($validation->hasError('Amplua')) ? 'is-invalid' : ''; ?>" name="Diagnos"
                   value="<?= $player["Diagnos"] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('Diagnos') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Возраст</label>
            <input type="text" class="form-control <?= ($validation->hasError('Age')) ? 'is-invalid' : ''; ?>" name="Age"
                   value="<?= $player["Age"] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('Age') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Пол</label>
            <input type="text" class="form-control <?= ($validation->hasError('Sex')) ? 'is-invalid' : ''; ?>" name="Sex"
                   value="<?= $player["Sex"] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('Sex') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Дата поступления</label>
            <input type="text" class="form-control <?= ($validation->hasError('Arrived')) ? 'is-invalid' : ''; ?>" name="Arrived"
                   value="<?= $player["Arrived"] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('Arrived') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Дата выписки</label>
            <input type="text" class="form-control <?= ($validation->hasError('Leftleave')) ? 'is-invalid' : ''; ?>" name="Leftleave"
                   value="<?= $player["Leftleave"] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('Leftleave') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Симптомы</label>
            <input type="text" class="form-control <?= ($validation->hasError('Simptoms')) ? 'is-invalid' : ''; ?>" name="Simptoms"
                   value="<?= $player["Simptoms"] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('Simptoms') ?>
            </div>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Сохранить</button>
        </div>
        </form>
    </div>
<?= $this->endSection() ?>