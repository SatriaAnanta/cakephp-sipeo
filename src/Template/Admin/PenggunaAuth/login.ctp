<?php $this->layout = 'logincustom'; ?>

<?= $this->Form->create() ?>
  <div class="form-group has-feedback">
  <?= $this->Form->control('username') ?>
  </div>
  <div class="form-group has-feedback">
  <?= $this->Form->control('password') ?>
  </div>
  <div class="row">
    <div class="col-xs-8">
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
    <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary btn-block btn-flat']); ?>
    </div>
    <!-- /.col -->
    <?= $this->Form->end() ?>
  </div>
