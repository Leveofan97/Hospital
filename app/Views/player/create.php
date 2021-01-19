<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

    <div class="container" style="max-width: 540px;">

        <?= form_open_multipart('player/store'); ?>
<!--        <input type="hidden" name="id" value="--><?//= $player["id"] ?><!--">-->

        <div class="form-group">
            <label for="FIO">ФИО больного</label>
            <input type="text" class="form-control <?= ($validation->hasError('FIO')) ? 'is-invalid' : ''; ?>" name="FIO">
            <div class="invalid-feedback">
                <?= $validation->getError('FIO') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Amplua">Диагноз</label>
            <input type="text" class="form-control <?= ($validation->hasError('Diagnos')) ? 'is-invalid' : ''; ?>" name="Diagnos">
            <div class="invalid-feedback">
                <?= $validation->getError('Diagnos') ?>
            </div>
        </div>
        <div class="form-group">
            <label for="Age">Возраст</label>
            <input type="text" class="form-control <?= ($validation->hasError('Age')) ? 'is-invalid' : ''; ?>" name="Age">
            <div class="invalid-feedback">
                <?= $validation->getError('Age') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Sex">Пол</label>
            <input type="text" class="form-control <?= ($validation->hasError('Sex')) ? 'is-invalid' : ''; ?>" name="Sex">
            <div class="invalid-feedback">
                <?= $validation->getError('Sex') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Arrived">Дата поступления</label>
            <input type="text" class="form-control <?= ($validation->hasError('Arrived')) ? 'is-invalid' : ''; ?>" name="Arrived">
            <div class="invalid-feedback">
                <?= $validation->getError('Arrived') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Leftleave">Дата выписки</label>
            <input type="text" class="form-control <?= ($validation->hasError('Leftleave')) ? 'is-invalid' : ''; ?>" name="Leftleave">
            <div class="invalid-feedback">
                <?= $validation->getError('Leftleave') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="Simptoms">Симптомы</label>
            <input type="text" class="form-control <?= ($validation->hasError('Simptoms')) ? 'is-invalid' : ''; ?>" name="Simptoms">
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