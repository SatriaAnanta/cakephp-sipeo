<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Sejarah Pengerjaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pilih Topik</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih Topik</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Topik</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php  $no = 1; ?>
                <?php foreach ($topik as $topik): ?>
                <tr>
                <td><?= h($no) ?></td>
                <td><?= h($topik->pertanyaan->materi->topik->topik) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Pilih Topik'), ['action' => 'sejarahmateri', $topik->pertanyaan->materi->topik->key_topik], ['class'=>'btn btn-info btn-xs']) ?>
                </td>
                </tr>
                <?php  $no++; ?>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Topik</th>
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