<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pengerjaan
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
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
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm"  style="width: 180px;">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Fill in to start search') ?>">
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                <th><?= $this->Paginator->sort('key_pengerjaan') ?></th>
                <th><?= $this->Paginator->sort('topik') ?></th>
                <th><?= $this->Paginator->sort('pertanyaan') ?></th>
                <th><?= $this->Paginator->sort('materi') ?></th>
                <th><?= $this->Paginator->sort('jawaban') ?></th>
                <th><?= $this->Paginator->sort('bobot') ?></th>
                <th><?= $this->Paginator->sort('key_data_pengguna') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($pengerjaan as $pengerjaan): ?>
              <tr>
                <td><?= $this->Number->format($pengerjaan->key_pengerjaan) ?></td>
                <td><?= h($pengerjaan->topik) ?></td>
                <td><?= h($pengerjaan->pertanyaan) ?></td>
                <td><?= h($pengerjaan->materi) ?></td>
                <td><?= h($pengerjaan->jawaban) ?></td>
                <td><?= $this->Number->format($pengerjaan->bobot) ?></td>
                <td><?= $this->Number->format($pengerjaan->key_data_pengguna) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $pengerjaan->key_pengerjaan], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pengerjaan->key_pengerjaan], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pengerjaan->key_pengerjaan], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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
