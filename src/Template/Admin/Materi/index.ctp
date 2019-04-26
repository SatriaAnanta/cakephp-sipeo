<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Materi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Materi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Materi</h3>
            </div>
            <div class="box-header"><?= $this->Html->link(__('Tambah Materi'), ['action' => 'add'], ['class'=>'btn btn-success btn-xl']) ?></div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Key Materi</th>
                  <th>Topik</th>
                  <th>Materi</th>
                  <th>Isi Materi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($materi as $materi): ?>
                <tr>
                <td><?= h($materi->key_materi) ?></td>
                <td><?= h($materi->topik->topik) ?></td>
                <td><?= h($materi->materi) ?></td>
                <td><?= h($materi->isi_materi) ?></td>
                <td class="actions" style="white-space:nowrap">
                <?= $this->Html->link(__('Lihat'), ['action' => 'view', $materi->key_materi], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Ubah'), ['action' => 'edit', $materi->key_materi], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Hapus'), ['action' => 'delete', $materi->key_materi], ['confirm' => __('Konfirmasi Penghapusan Data '.$materi->materi), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Key Materi</th>
                  <th>Topik</th>
                  <th>Materi</th>
                  <th>Isi Materi</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "language": {
                 "info": "Menampilkan  _START_ Sampai _END_ Data Dari _TOTAL_ Data",
                 "paginate": {
                "next": "Berikutnya",
                "previous" : "Sebelumnya"
                 },
                 "lengthMenu": "Tampilkan _MENU_ Data",
                 "search": "Cari",
                 "zeroRecords": "Data Tidak Ditemukan",
                 "infoFiltered": " - difilter Dari _MAX_ Data",
                 "infoEmpty": "Tidak Ada Data Untuk Ditampilkan"
			         },
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php $this->end(); ?>