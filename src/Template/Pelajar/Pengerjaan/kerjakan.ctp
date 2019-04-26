<section class="content-header">
  <h1>
    Pengerjaan
    <small><?= __('Kerjakan') ?></small>
  </h1>
  <ol class="breadcrumb">
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
          <!--  <h3 class="box-title"><?= __('Form') ?></h3> -->
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create('Pengerjaan', array('url'=>array('controller'=>'pengerjaan', 'type' => 'post', 'action'=>'tes'))); ?>
          <div class="box-body">
          <?= $this->Form->control('topik',
                    ['label' => 'Topik',
                    'readonly' => 'readonly',
                    'value'=> $pertanyaan->materi->topik->topik]); ?>

          <?= $this->Form->control('materi',
                    ['label' => 'Materi',
                    'readonly' => 'readonly',
                    'value'=> $pertanyaan->materi->materi]); ?>

          <?= $this->Form->control('pertanyaan',
                    ['label' => 'Pertanyaan',
                    'readonly' => 'readonly',
                    'value'=> $pertanyaan->pertanyaan]); ?>

<?= $this->Form->control('jawaban',
                    ['label' => 'Jawaban',    'rows' => 10]); ?>



          <?= $this->Form->control('key',
                    ['label' => 'Key',
                    'readonly' => 'readonly',
                    'type' => 'hidden',
                    'value'=> $pertanyaan->key_pertanyaan]); ?>                                                                   
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

