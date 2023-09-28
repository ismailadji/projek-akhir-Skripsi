<?php
  if ($this->session->userdata('level') == 'Administrator') {?>
  
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Alexander Pierce</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
      
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li>
            <a href="<?= base_url()?>dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url()?>tam_prof_perpus">
              <i class="fa fa-graduation-cap"></i> <span>Profil Perpus</span>
            </a>
          </li>
          
          <li>
            <a href="<?= base_url()?>anggota">
              <i class="fa fa-group"></i> <span>Data Anggota</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url()?>pengunjung">
              <i class="fa fa-book"></i> <span>Data Pengunjung</span>
            </a>
          </li>

          <li class="active treeview">
            <a href="#">
              <i class="fa fa-desktop"></i> <span>Data Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>buku"><i class="fa fa-circle-o"></i> Data Buku</a></li>
              <li class="active"><a href="<?= base_url()?>lampiran"><i class="fa fa-circle-o"></i> Lampiran Buku</a></li>
              <li class="active"><a href="<?= base_url()?>kategori"><i class="fa fa-circle-o"></i> Kategori Buku</a></li>
              <li class="active"><a href="<?= base_url()?>rak"><i class="fa fa-circle-o"></i> Rak Buku</a></li>
            </ul>
          </li>

          <li class="active treeview">
            <a href="#">
              <i class="fa fa-area-chart"></i> <span>Transaksi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>peminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
              <li class="active"><a href="<?= base_url()?>pengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
            </ul>
          </li>

          <li>
            <a href="<?= base_url()?>pinjaman_masuk">
              <i class="fa fa-cart-plus"></i> <span>Peminjaman Masuk</span>
            </a>
          </li>

          <li class="active treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>lpeminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
              <li class="active"><a href="<?= base_url()?>lpengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
              <li class="active"><a href="<?= base_url()?>lpengunjung"><i class="fa fa-circle-o"></i> Pengunjung</a></li>
              <li class="active"><a href="<?= base_url()?>ldenda"><i class="fa fa-circle-o"></i> Denda</a></li>
            </ul>
          </li>

          <li class="active treeview">
            <a href="#">
              <i class="fa fa-gears"></i> <span>Pengaturan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>pprof_perpus"><i class="fa fa-circle-o"></i> Profil Perpus</a></li>
              <li class="active"><a href="<?= base_url()?>pdenda"><i class="fa fa-circle-o"></i> Denda</a></li>
            </ul>
          </li>
          
          <hr>
          <li>
            <a href="<?= base_url()?>auth/logout">
              <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
          </li>
          </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
  
  <?php } else if ($this->session->userdata('level') == 'Siswa') { ?> 

    <!-- tampilan siswa -->

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Alexander Pierce</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
      
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li>
            <a href="<?= base_url()?>tampilan_user/dashboard_user">
              <i class="fa fa-dashboard"></i> <span>Dashboard User</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url()?>tam_prof_perpus">
              <i class="fa fa-graduation-cap"></i> <span>Profil Perpus</span>
            </a>
          </li>
          
          <li>
            <a href="<?= base_url()?>tampilan_user/tam_user">
              <i class="fa fa-group"></i> <span>Data Anggota</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url()?>tampilan_user/tam_pengunjung">
              <i class="fa fa-book"></i> <span>Data Pengunjung</span>
            </a>
          </li>

          <li class="active treeview">
            <a href="#">
              <i class="fa fa-desktop"></i> <span>Data Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>tampilan_user/tam_buku"><i class="fa fa-circle-o"></i> Data Buku</a></li>
              <li class="active"><a href="<?= base_url()?>tampilan_user/tam_lampiran"><i class="fa fa-circle-o"></i> Lampiran Buku</a></li>
              <!-- <li class="active"><a href="<?= base_url()?>kategori"><i class="fa fa-circle-o"></i> Kategori Buku</a></li>
              <li class="active"><a href="<?= base_url()?>rak"><i class="fa fa-circle-o"></i> Rak Buku</a></li> -->
            </ul>
          </li>

          <li class="active treeview">
            <a href="#">
              <i class="fa fa-exchange"></i> <span>Transaksi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>peminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
              <li class="active"><a href="<?= base_url()?>pengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
            </ul>
          </li>

          <!-- <li>
            <a href="<?= base_url()?>pinjaman_masuk">
              <i class="fa fa-cart-plus"></i> <span>Peminjaman Masuk</span>
            </a>
          </li> -->

          <!-- <li class="active treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>lpeminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
              <li class="active"><a href="<?= base_url()?>lpengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
              <li class="active"><a href="<?= base_url()?>lpengunjung"><i class="fa fa-circle-o"></i> Pengunjung</a></li>
              <li class="active"><a href="<?= base_url()?>ldenda"><i class="fa fa-circle-o"></i> Denda</a></li>
            </ul>
          </li> -->

          <!-- <li class="active treeview">
            <a href="#">
              <i class="fa fa-gears"></i> <span>Pengaturan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>pprof_perpus"><i class="fa fa-circle-o"></i> Profil Perpus</a></li>
              <li class="active"><a href="<?= base_url()?>pdenda"><i class="fa fa-circle-o"></i> Denda</a></li>
            </ul>
          </li> -->
          
          <hr>
          <li>
            <a href="<?= base_url()?>auth/logout">
              <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
          </li>
          </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

  <?php } else { ?> 
    <!-- tampilan guru -->
    
    <aside class="main-sidebar">
      
      <section class="sidebar">
        
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Alexander Pierce</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
      
       
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li>
            <a href="<?= base_url()?>dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url()?>tam_prof_perpus">
              <i class="fa fa-graduation-cap"></i> <span>Profil Perpus</span>
            </a>
          </li>
          
          <li>
            <a href="<?= base_url()?>anggota">
              <i class="fa fa-group"></i> <span>Data Anggota</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url()?>pengunjung">
              <i class="fa fa-book"></i> <span>Data Pengunjung</span>
            </a>
          </li>

          <li class="active treeview">
            <a href="#">
              <i class="fa fa-desktop"></i> <span>Data Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>buku"><i class="fa fa-circle-o"></i> Data Buku</a></li>
              <li class="active"><a href="<?= base_url()?>lampiran"><i class="fa fa-circle-o"></i> Lampiran Buku</a></li>
              
            </ul>
          </li>

          <!-- <li class="active treeview">
            <a href="#">
              <i class="fa fa-exchange"></i> <span>Transaksi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>peminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
              <li class="active"><a href="<?= base_url()?>pengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
            </ul>
          </li> -->

          <!-- <li>
            <a href="<?= base_url()?>pinjaman_masuk">
              <i class="fa fa-cart-plus"></i> <span>Peminjaman Masuk</span>
            </a>
          </li> -->

          <!-- <li class="active treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>lpeminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
              <li class="active"><a href="<?= base_url()?>lpengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
              <li class="active"><a href="<?= base_url()?>lpengunjung"><i class="fa fa-circle-o"></i> Pengunjung</a></li>
              <li class="active"><a href="<?= base_url()?>ldenda"><i class="fa fa-circle-o"></i> Denda</a></li>
            </ul>
          </li> -->

          <!-- <li class="active treeview">
            <a href="#">
              <i class="fa fa-gears"></i> <span>Pengaturan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= base_url()?>pprof_perpus"><i class="fa fa-circle-o"></i> Profil Perpus</a></li>
              <li class="active"><a href="<?= base_url()?>pdenda"><i class="fa fa-circle-o"></i> Denda</a></li>
            </ul>
          </li> -->
          
          <hr>
          <li>
            <a href="<?= base_url()?>auth/logout">
              <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

  <?php }
?>

