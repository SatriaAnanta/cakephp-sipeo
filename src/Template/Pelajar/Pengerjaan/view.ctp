<section class="content-header">
  <h1>
    <?php echo __('Pengerjaan'); ?>
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
                                            <?= h($pengerjaan->pertanyaan->materi->topik->topik) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Materi') ?></dt>
                                        <dd>
                                            <?= h($pengerjaan->pertanyaan->materi->materi) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Pertanyaan') ?></dt>
                                        <dd>
                                            <?= h($pengerjaan->pertanyaan->pertanyaan) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Jawaban') ?></dt>
                                        <dd>
                                            <?= h($pengerjaan->jawaban) ?>
                                        </dd>
                                                                                                                                    
                                            
                                          <dt><?= __('Nilai') ?></dt>
                                <dd>
                                    <?= $this->Number->format($pengerjaan->nilai) ?>
                                </dd>

                                <dt><?= __('Percobaan') ?></dt>

                                                                <dd>
                                    <?= $this->Number->format($pengerjaan->percobaan) ?>
                                </dd>
                                                                                                
                                            
                                            
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
