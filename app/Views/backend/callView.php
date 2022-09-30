<?= $this->include('backend/include/header'); ?>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <?= $this->include('backend/include/leftmenu'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="row">
      <div class="col-3"></div>
      <div class="col-6">
      <?php if(session()->get('info')) : ?>             
              <div class="alert alert-info" style="text-align:center;" role="alert">
                 <?php echo session()->getFlashdata('info'); ?>
              </div>
              <?php endif; ?>

         <?php if(session()->get('danger')) : ?>             
              <div class="alert alert-danger" role="alert">
                 <?php echo session()->getFlashdata('danger'); ?>
              </div>
              <?php endif; ?> 
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Masa Takip</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
               <div class=row >
                 <div class="col-lg-3"></div>
  
                 <div class="col-12 col-xl-6">
            <section class="content pb-3">
             <div class="container-fluid h-100">
          <div class="card card-row card-info ">
          <div class="card-header">
            <h3 class="card-title">
              Garson Bekleyen Masalar
            </h3>
          </div>
          <div class="card-body">

          <?php foreach($veriler as $row ): ?>
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">Masa no:<b style="color:green;"><?php echo $row['table_no'] ?></b></h5>
               
                <div class="card-tools">
                  <?php
                  $siparis_saat=strtotime($row['time']);
                  $aktif_saat=strtotime(date('H:i'));
                  $islem=($aktif_saat-$siparis_saat)/60;
                  ?>
                <h5 class="card-title">Süre:<b style="color:purple;"><?php  echo $islem  ?>dk</b></h5>
       
                <a href="<?= base_url('callDelete/'.$row['id']) ?>" onclick="return confirm('Silmek istediğinize eminmisiniz?')" class="btn btn-tool btn-link"><i class="fa fa-trash" aria-hidden="true" style="color:#cd5c5c"></i></a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>         
          <!-- Card bitişi -->
          </div>

      </div>
    </section>
          </div>



            <div class="col-lg-3"></div>
           </div>

              





              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Footer
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?= $this->include('backend/include/footer'); ?>