<?php $this->layout = 'registercustom'; ?>
<?= $this->Flash->render() ?>
<?php echo $this->Form->create('sad') ?>
<div class="form-group has-feedback">
    <?= $this->Form->control('pengguna.nama', ['required' => true]); ?>
  </div>
  <div class="form-group has-feedback">
    <?= $this->Form->control('penggunaAuth.username', ['required' => true,'type' => 'text']); ?>
  </div>
  <div class="form-group has-feedback">
    <?= $this->Form->control('pengguna.email',['required' => true]); ?>
  </div>
  <div class="form-group has-feedback">
    <?= $this->Form->control('penggunaAuth.password',['required' => true]); ?>
  </div>
  <div class="form-group has-feedback">
    <?= $this->Form->control('penggunaAuth.confirm_password', ['required' => true, 'type' => 'password']); ?>
  </div>
  <div class="form-group has-feedback">
    <?= $this->Form->control('penggunaAuth.key_peran', ['required' => true, 'type' => 'number', 'readonly' => 'readonly', 'type' => 'hidden','value'=>2]); ?>
  </div>
  <div class="row">
    <div class="col-xs-8">
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
    <?= $this->Form->button(__('Register'), ['class' => 'btn btn-primary btn-block btn-flat']); ?>
    </div>
    <!-- /.col -->
  </div>
<?php echo $this->Form->end(); ?>