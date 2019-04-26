<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pengerjaan
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Pengerjaan</h3>
          <div class="box-tools">
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                <th><?= $this->Paginator->sort('key_pengerjaan') ?></th>
                <th><?= $this->Paginator->sort('Pertanyaan.pertanyaan','Pertanyaan') ?></th>
                <th><?= $this->Paginator->sort('jawaban') ?></th>
                <th><?= $this->Paginator->sort('nilai') ?></th>
                <th><?= $this->Paginator->sort('Percobaan') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($pengerjaan as $pengerjaan): ?>
              <tr>
                <td><?= $this->Number->format($pengerjaan->key_pengerjaan) ?></td>
                <td><?= h($pengerjaan->pertanyaan->pertanyaan) ?></td>
                <td><?= h($pengerjaan->jawaban) ?></td>
                <td><?= h($pengerjaan->nilai) ?></td>
                <td><?= h($pengerjaan->percobaan) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $pengerjaan->key_pengerjaan], ['class'=>'btn btn-info btn-xs']) ?>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <?php echo $this->Paginator->numbers(); ?>
          </ul>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->
