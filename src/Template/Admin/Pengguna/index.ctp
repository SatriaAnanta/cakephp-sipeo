<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pengguna</h3>
            </div>
         <!--   <div class="box-header"><?php// $this->Html->link(__('Tambah Materi'), ['action' => 'add'], ['class'=>'btn btn-success btn-xl'])?></div>  -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Peran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pengguna as $pengguna): ?>
                <tr>
                <td><?= $this->Number->format($pengguna->key_data_pengguna) ?></td>
                <td><?= h($pengguna->nama) ?></td>
                <td><?= h($pengguna->email) ?></td>
                <td><?= h($pengguna->pengguna_auth->username)?></td>
                <td><?= h($pengguna->pengguna_auth->peran->nama_peran)?></td>
                <td class="actions" style="white-space:nowrap">
                <?= $this->Html->link(__('View'), ['action' => 'view', $pengguna->key_data_pengguna], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pengguna->key_data_pengguna], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pengguna->key_data_pengguna], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Peran</th>
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