<section class="content-header">
  <h1>
    Pengguna Auth
    <small><?= __('Sad') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
          <?= $this->Form->create() ?>
          <div class="box-body">
          <?php
                echo $this->Form->input('current_password', ['type' => 'password', 'label'=>'Current Password', 'value' => '']);
                echo $this->Form->input('password', ['type'=>'password' ,'label'=>'Password', 'value' => '']);
                echo $this->Form->input('confirm_password', ['type' => 'password' , 'label'=>'Repeat password', 'value' => '']); 
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

