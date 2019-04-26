<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
          <!--  <form role="form" method="post" action="/pelajar/pengerjaan/tes"> -->
            <?= $this->Form->create('Pengerjaan', array('url'=>array('controller'=>'pengerjaan', 'type' => 'post', 'action'=>'tes'))); ?>
              <div class="box-body">
                <?php echo $this->Form->controls([
                      'topik' => ['label' => 'Topik',
                      'readonly' => 'readonly',
                      'value'=> $pertanyaan->materi->topik->topik],
                      'materi' => ['label' => 'Materi',
                      'readonly' => 'readonly',
                      'value'=> $pertanyaan->materi->materi],
                      'pertanyaan' => ['label' => 'Pertanyaan',
                      'readonly' => 'readonly',
                      'value'=> $pertanyaan->pertanyaan],
                      'jawaban' => ['label' => 'Jawaban'],
                      'key' => ['label' => 'Key',
                      'readonly' => 'readonly',
                      'type' => 'hidden',
                      'value'=> $pertanyaan->key_pertanyaan]
                      ]);           
          ?>       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?= $this->Form->button(__('Save')) ?>
              </div>
              <?= $this->Form->end() ?>
           <!-- </form> -->
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->

          <!-- /.box -->


          <!-- /.box -->

          <!-- Input addon -->
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

