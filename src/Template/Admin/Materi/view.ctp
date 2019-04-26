<section class="content-header">
  <h1>
    <?php echo __('Materi'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Back'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Information'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                <dt><?= __('Topik') ?></dt>
                <dd>
                                    <?= h($materi->topik->topik) ?>
                                </dd>
                                                                                                                <dt><?= __('Materi') ?></dt>
                                        <dd>
                                            <?= h($materi->materi) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Isi Materi') ?></dt>
                                        <dd>
                                            <?= h($materi->isi_materi) ?>
                                        </dd>
                                        <?php foreach ($materi->pertanyaan as $pertanyaan): ?>
                                        <dt><?= __('Pertanyaan') ?></dt>
                                        <dd> <?= h($pertanyaan->pertanyaan) ?> </dd>
                                        <?php foreach ($pertanyaan->jawaban as $jawaban): ?>
                                        <dt><?= __('Jawaban') ?></dt>
                                        <dd> <?= h($jawaban->jawaban) ?> </dd>
                                        <?php endforeach; ?> 
                                            <?php endforeach; ?>  
                                 </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

</section>
