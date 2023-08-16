<?php
//==================================== HOME ====================================
if ($page == 'home') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jml_mahasiswa; ?></h3>

                <p>Jumlah Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('admin/mahasiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_ukm; ?></h3>

                <p>Jumlah UKM</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?php echo base_url('admin/ukm') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Selamat Datang Admin</h3>
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
          <h2>Info</h2>
          <p></p>
          <p></p>

        </div>
        <div class="card-footer">
          
      </div>

    </section>
  </div>
<?php
}

//==================================== UKM ====================================
else if ($page == 'ukm') {
  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo  $judul; ?></h1>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="card">
          <div class="card-body">
            <a href=<?php echo base_url("admin/ukm_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">
              Tambah Data</a>
            <table id="datatable_01" class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th hidden>Id  </th>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php
              $no = 1;
              foreach ($ukm as $d) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td hidden><?php echo $d['id_ukm'] ?></td>
                  <td><?php echo $d['nama_ukm'] ?></td>
                  <td><?php echo $d['deskripsi'] ?></td>
                  <td>
                    <a href=<?php echo base_url("admin/ukm_edit/") . $d['id_ukm']; ?> class="btn btn-warning btn-sm" > <i class="fas fa-pencil-alt"></i> Edit </a>
                     <a href=<?php echo base_url("admin/ukm_hapus/") . $d['id_ukm']; ?> onclick="return confirm('Yakin menghapus UKM : <?php echo $d['id_ukm']; ?> ?');" ; class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Delete</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </table>
  
          </div>
      </section>
    </div>
  
  <?php
  }
  
  //==================================== UKM TAMBAH ====================================
  else if ($page == 'ukm_tambah') {
    ?>
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?php echo  $judul; ?></h1>
              </div>
            </div>
          </div>
        </section>
    
        <section class="content">
          <div class="card">
            <div class="card-body">
    
              <form method="POST" action="<?php echo base_url('admin/ukm_tambah'); ?>" class="form-horizontal">
    
                <div class="card-body">
  
                  <div class="form-group row">
                    <label for="nama_ukm" class="col-sm-2 col-form-label">Nama UKM</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_ukm" id="nama_ukm_supplier" value="<?php echo set_value('nama_ukm'); ?>" placeholder="Masukkan Nama UKM">
                      <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_ukm')); ?></span>
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo set_value('deskripsi'); ?>" placeholder="Masukkan Deskripsi">
                      <span class="badge badge-warning"><?php echo strip_tags(form_error('deskripsi')); ?></span>
                    </div>
                  </div>
    
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                </div>
              </form>
    
    
            </div>
        </section>
      </div>
    <?php
    } 
    
   //--------------------------------- UKM Edit ---------------------------------
   else if ($page == 'ukm_edit') {
    ?>
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?php echo  $judul; ?></h1>
              </div>
            </div>
          </div>
        </section>
    
        <section class="content">
          <div class="card">
            <div class="card-body">
    
              <form method="POST" action="<?php echo base_url('admin/ukm_edit/' . $d['id_ukm']); ?>" class="form-horizontal">
    
                <div class="form-group row">
                    <label for="id_ukm" class="col-sm-2 col-form-label" hidden>Id ukm</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id_ukm" id="id_ukm" value="<?php echo set_value('id_ukm', $d['id_ukm']); ?>" placeholder="Masukkan id ukm" hidden>
                      <span class="badge badge-warning"><?php echo strip_tags(form_error('id_ukm')); ?></span>
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="nama_ukm" class="col-sm-2 col-form-label">Nama UKM</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_ukm" id="nama_ukm" value="<?php echo set_value('nama_ukm', $d['nama_ukm']); ?>" placeholder="Masukkan Nama UKM">
                      <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_ukm')); ?></span>
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo set_value('deskripsi', $d['deskripsi']); ?>" placeholder="Masukkan deskripsi">
                      <span class="badge badge-warning"><?php echo strip_tags(form_error('deskripsi')); ?></span>
                    </div>
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                </div>
              </form>
    
    
            </div>
        </section>
      </div>
    <?php
    }

//==================================== MAHASISWA ====================================
else if ($page == 'mahasiswa') {
  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo  $judul; ?></h1>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="card">
          <div class="card-body">
            <a href=<?php echo base_url("admin/mahasiswa_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">
              Tambah Data</a>
            <table id="datatable_01" class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th hidden>Id Mahasiswa</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php
              $no = 1;
              foreach ($mahasiswa as $d) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td hidden><?php echo $d['id_mahasiswa'] ?></td>
                  <td><?php echo $d['nim'] ?></td>
                  <td><?php echo $d['nama'] ?></td>
                  <td><?php echo $d['tgl'] ?></td>
                  <td><?php echo $d['alamat'] ?></td>
                  <td>
                    <a href=<?php echo base_url("admin/mahasiswa_edit/") . $d['id_mahasiswa']; ?> class="btn btn-warning btn-sm" > <i class="fas fa-pencil-alt"></i> Edit </a>
                     <a href=<?php echo base_url("admin/mahasiswa_hapus/") . $d['id_mahasiswa']; ?> onclick="return confirm('Yakin menghapus Mahasiswa : <?php echo $d['id_mahasiswa']; ?> ?');" ; class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Delete</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </table>
  
          </div>
      </section>
    </div>
  
  <?php
  }

 //==================================== MAHASISWA TAMBAH ====================================
 else if ($page == 'mahasiswa_tambah') {
  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo  $judul; ?></h1>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="card">
          <div class="card-body">
  
            <form method="POST" action="<?php echo base_url('admin/mahasiswa_tambah'); ?>" class="form-horizontal">
  
              <div class="card-body">

                <div class="form-group row">
                  <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nim" id="nim" value="<?php echo set_value('nim'); ?>" placeholder="Masukkan NIM Mahasiswa">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama Mahasiswa">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nama')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                <label for="tgl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl" id="tgl" value="<?php echo set_value('tgl'); ?>" placeholder="Masukkan Tanggal Lahir">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Masukkan Alamat Mahasiswa">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat')); ?></span>
                  </div>
                </div>
  
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
            </form>
  
  
          </div>
      </section>
    </div>
  <?php
  } 

//--------------------------------- MAHASISWA Edit ---------------------------------
else if ($page == 'mahasiswa_edit') {
  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo  $judul; ?></h1>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="card">
          <div class="card-body">
  
            <form method="POST" action="<?php echo base_url('admin/mahasiswa_edit/' . $d['id_mahasiswa']); ?>" class="form-horizontal">

              <div hidden class="form-group row">
                  <label for="id_mahasiswa" class="col-sm-2 col-form-label">Id Mahasiswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_mahasiswa" id="id_mahasiswa" value="<?php echo set_value('id_mahasiswa', $d['id_mahasiswa']); ?>" placeholder="Masukkan Id ">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('id_mahasiswa')); ?></span>
                  </div>
                </div>
          
                <div class="form-group row">
                  <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nim" id="nim" value="<?php echo set_value('nim', $d['nim']); ?>" placeholder="Masukkan nim">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama', $d['nama']); ?>" placeholder="Masukkan nama">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nama')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tgl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl" id="tgl" value="<?php echo set_value('tgl', $d['tgl']); ?>" placeholder="Masukkan Tanggal Lahir">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo set_value('alamat', $d['alamat']); ?>" placeholder="Masukkan alamat">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat')); ?></span>
                  </div>
                </div>
  
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
              </div>
            </form>
  
  
          </div>
      </section>
    </div>
  <?php
  }

//==================================== ANGGOTA ====================================
else if ($page == 'anggota') {
  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo  $judul; ?></h1>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="card">
          <div class="card-body">
            <a href=<?php echo base_url("admin/anggota_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">
              Tambah Data</a>
            <table id="datatable_01" class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th hidden>Id Anggota</th>
                  <th>NIM</th>
                  <th>NAMA MAHASISWA</th>
                  <th>NAMA UKM</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php
              $no = 1;
              foreach ($anggota as $d) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td hidden><?php echo $d['id_anggota'] ?></td>
                  <td><?php echo $d['nim'] ?></td>
                  <td><?php echo $d['nama'] ?></td>
                  <td><?php echo $d['nama_ukm'] ?></td>
                  <td>
                  <a href=<?php echo base_url("admin/anggota_hapus/") . $d['id_anggota']; ?> onclick="return confirm('Yakin menghapus Anggota : <?php echo $d['id_anggota']; ?> ?');" ; class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Keluarkan</a>
                </tr>
              <?php
              }
              ?>
            </table>
  
          </div>
      </section>
    </div>
  
  <?php
  }
  
//==================================== ANGGOTA TAMBAH ====================================
else if ($page == 'anggota_tambah') {
  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo  $judul; ?></h1>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="card">
          <div class="card-body">
  
            <form method="POST" action="<?php echo base_url('admin/anggota_tambah'); ?>" class="form-horizontal">
  
              <div class="card-body">
  
                <div class="form-group row">
                <label for="id_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                  <select class="form-control" <?php echo form_dropdown('id_mahasiswa', $ddmahasiswa, set_value('id_mahasiswa')); ?></select>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_mahasiswa')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_ukm" class="col-sm-2 col-form-label">UKM</label>
                <div class="col-sm-10">
                  <select class="form-control" <?php echo form_dropdown('id_ukm', $ddukm, set_value('id_ukm')); ?></select>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_ukm')); ?></span>
                </div>
              </div>
  
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
            </form>
  
  
          </div>
      </section>
    </div>
  <?php
  } 


?>