<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                  <b>Nama</b> <a class="pull-right"><?=$pengguna->nama?></a>
                </li>
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?=$pengguna->pengguna_auth->username?></a>
                </li>
                <li class="list-group-item">
                  <b>Peran</b> <a class="pull-right"><?=$pengguna->pengguna_auth->peran->nama_peran?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?=$pengguna->email?></a>
                </li>
                <li class="list-group-item">
                  <b>Esai Dikerjakan</b> <a class="pull-right"><?=$pengerjaan?></a>
                </li>
              </ul>

              <?= $this->Html->link(__('Ubah'), ['action' => 'edit', $pengguna->key_data_pengguna], ['class'=>'btn btn-primary btn-block']) ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
