<section class="content-header">
  <h1>
    Jawaban
    <small><?= __('Tambah') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Kembali'), ['action' => 'index'], ['escape' => false]) ?>
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
        <?= $this->Form->create($jawaban, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('key_pertanyaan', array('type' => 'select', 'options' => $pertanyaan,'label' => "Pertanyaan"));
            echo $this->Form->input('jawaban');
            echo $this->Form->input('bobot');
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Simpan')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

