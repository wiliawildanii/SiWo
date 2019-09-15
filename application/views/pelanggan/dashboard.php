<?php $date = @$_REQUEST['date']; ?>
<div class="col-sm-9">
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-dashboard"></i> Dashboard</h4>
        </div>
        <div class="panel-body">
            <center><h2>Selamat Datang, <?= $this->session->userdata('nama'); ?> !</h2></center>
            <div class="col-sm-12">
                <h4 class="page-header">Informasi Akun Anda</h4>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Username & Password Anda
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li><strong>Username</strong> : Gunakan email Anda</li>
                            <li><strong>Password</strong> : <?= $this->session->userdata('password') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Paket yang Anda pilih
                    </div>
                    <div class="panel-body">
                        <?php if (count($transaksi) != null): ?>
                                Anda memiliki <?= count($transaksi) ?> pemesanan : <br>
                                <ul class="list-unstyled">
                                  <li><a href="<?= base_url() . 'lihat/transaksi/' . $transaksi->id_pemesanan ?>" target="_blank" >Pada tanggal <?= nice_date($transaksi->tgl_acara,'d-m-Y') ?> <small><span class="glyphicon glyphicon-new-window"></span></small></a></li>
                                </ul>
                        <?php else: ?>
                                Anda belum memiliki transaksi
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
              <h4 class="page-header">Pilih Paket</h4>
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-info">
                      <div class="panel-heading"><i class="fa fa-calendar"></i> Jadwal Acara Anda</div>
                      <div class="panel-body">
                          <form class="" action="<?= base_url() . 'pelanggan?date=' . $date; ?>" method="get">
                            <div class="alert alert-warning">
                              <ul>
                                <li>Pilih jadwal acara Anda dan klik tombol lihat untuk melihat ketersediaan pelayanan kami pada tanggal tersebut</li>
                                <li>Pemesanan dapat dilakukan minimal 10 hari dari tanggal sekarang.</li>
                              </ul>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                  <input type="text" name="date" class="form-control" value="<?= isset($date) ? $date : '' ?>" placeholder="Tanggal acara Anda">
                                  <div class="input-group-btn">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-eye"></i> Lihat</button>
                                  </div>
                                </div>
                            </div>
                          </form>

                          <?php if (isset($date) && $date != ''): ?>
                            <hr>
                            <!--Tab menu-->
                            <form action="<?= base_url() . 'pelanggan/transaksi' ?>" method="post">
                              <input type="hidden" name="tgl_acara" value="<?= $_REQUEST['date'] ?>">
                              <div id="tab">
                                  <!-- Nav tabs -->
                                  <ul class="nav nav-tabs" role="tablist">
                                      <li role="presentation" class="active"><a href="#gedung" aria-controls="gedung" role="tab" data-toggle="tab"><i class="fa fa-building-o fa-fw"></i>  Pilih Gedung</a></li>
                                      <li role="presentation"><a href="#dekorasi" aria-controls="dekorasi" role="tab" data-toggle="tab"><i class="fa fa-diamond fa-fw"></i>  Pilih Dekorasi</a></li>
                                      <li role="presentation"><a href="#rias" aria-controls="rias" role="tab" data-toggle="tab"><i class="fa fa-female fa-fw"></i>  Pilih Rias</a></li>
                                      <li role="presentation"><a href="#katering" aria-controls="katering" role="tab" data-toggle="tab"><i class="fa fa-cutlery fa-fw"></i>  Pilih Katering</a></li>
                                      <li role="presentation"><a href="#dokumentasi" aria-controls="dokumentasi" role="tab" data-toggle="tab"><i class="fa fa-camera-retro fa-fw"></i>  Pilih Dokumentasi</a></li>
                                  </ul>

                                  <!-- Tab panes -->
                                  <div class="tab-content">
                                    <!-- Gedung -->
                                    <div role="tabpanel" class="tab-pane active" id="gedung">
                                      <div class="row">
                                        <?php if (count($this->DashboardModel->dataGedung($date)) > 0): ?>
                                          <?php foreach ($this->DashboardModel->dataGedung($date) as $gedung): ?>
                                            <div class="col-sm-4">
                                                <label class="option">
                                                    <div class="thumbnail">
                                                        <input type="radio" name="gedung" value="<?= $gedung->gedung_id ?>">
                                                        <img src="<?= base_url() . 'uploads/' . $gedung->foto; ?>" alt="" class="gambar-gedung">
                                                        <div class="caption">
                                                            <h4><?= $gedung->nama_gedung; ?></h4>
                                                            <p class="price">Rp <?= number_format($gedung->harga_gedung,0,',','.'); ?></p>
                                                            <p class="alamat"><?= $gedung->deskripsi; ?></p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                          <?php endforeach; ?>
                                        <?php else: ?>
                                          <h4><center>Maaf tidak ada gedung yang tersedia pada tanggal ini</center></h4>
                                        <?php endif; ?>
                                      </div>
                                    </div>
                                    <!-- End of Gedung -->

                                    <!-- Dekorasi -->
                                    <div role="tabpanel" class="tab-pane" id="dekorasi">
                                        <div class="row">
                                          <?php if (count($this->DashboardModel->dataDekorasi($date)) > 0 ): ?>
                                            <?php foreach ($this->DashboardModel->dataDekorasi($date) as $dekorasi): ?>
                                              <div class="col-sm-4">
                                                  <label class="option">
                                                      <div class="thumbnail">
                                                          <input type="radio" name="dekorasi" value="<?= $dekorasi->dekorasi_id ?>">
                                                          <img src="<?= base_url() . 'uploads/' . $dekorasi->foto; ?>" alt="" class="gambar-gedung">
                                                          <div class="caption">
                                                              <h4><?= $dekorasi->nama_dekorasi; ?></h4>
                                                              <p class="price">Rp <?= number_format($dekorasi->harga_dekorasi,0,',','.'); ?></p>
                                                              <p class="alamat"><?= $dekorasi->deskripsi; ?></p>
                                                          </div>
                                                      </div>
                                                  </label>
                                              </div>
                                            <?php endforeach; ?>
                                          <?php else: ?>
                                            <h4><center>Maaf tidak ada dekorasi yang tersedia pada tanggal ini</center></h4>
                                          <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- End of Dekorasi -->

                                    <!-- Rias -->
                                    <div role="tabpanel" class="tab-pane" id="rias">
                                        <div class="row">
                                          <?php foreach ($this->db->get('rias')->result() as $rias): ?>
                                            <div class="col-sm-4">
                                                <label class="option">
                                                    <div class="thumbnail">
                                                        <input type="radio" name="rias" value="<?= $rias->rias_id ?>">
                                                        <img src="<?= base_url() . 'uploads/' . $rias->gambar; ?>" alt="" class="gambar-gedung">
                                                        <div class="caption">
                                                            <h4><?= $rias->nama_rias; ?></h4>
                                                            <p class="price">Rp <?= number_format($rias->harga_rias,0,',','.'); ?></p>
                                                            <p class="alamat"><?= $rias->deskripsi; ?></p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                          <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <!-- End of Rias -->

                                    <!-- Katering -->
                                    <div role="tabpanel" class="tab-pane" id="katering">
                                      <div class="row">
                                        <?php foreach ($this->db->get('katering')->result() as $katering): ?>
                                          <div class="col-sm-4">
                                              <label class="option">
                                                  <div class="thumbnail">
                                                      <input type="radio" name="katering" value="<?= $katering->katering_id ?>">
                                                      <!-- <img src="<?= base_url() . 'uploads/' . $katering->gambar; ?>" alt="" class="gambar-gedung"> -->
                                                      <div class="caption">
                                                          <h4><?= $katering->nama_katering; ?></h4>
                                                          <p class="price">Rp <?= number_format($katering->harga_katering,0,',','.'); ?></p>
                                                          <p class="alamat"><?= $katering->deskripsi; ?></p>
                                                      </div>
                                                  </div>
                                              </label>
                                          </div>
                                        <?php endforeach; ?>
                                      </div>
                                    </div>
                                    <!-- End of Katering -->

                                    <!-- Dokumentasi -->
                                    <div role="tabpanel" class="tab-pane" id="dokumentasi">
                                      <div class="row">
                                        <?php foreach ($this->db->get('dokumentasi')->result() as $dokumentasi): ?>
                                          <div class="col-sm-4">
                                              <label class="option">
                                                  <div class="thumbnail">
                                                      <input type="radio" name="dokumentasi" value="<?= $dokumentasi->dokumentasi_id ?>">
                                                      <!-- <img src="<?= base_url() . 'uploads/' . $dokumentasi->gambar; ?>" alt="" class="gambar-gedung"> -->
                                                      <div class="caption">
                                                          <h4><?= $dokumentasi->nama_dokumentasi; ?></h4>
                                                          <p class="price">Rp <?= number_format($dokumentasi->harga_dokumentasi,0,',','.'); ?></p>
                                                          <p class="alamat"><?= $dokumentasi->deskripsi; ?></p>
                                                      </div>
                                                  </div>
                                              </label>
                                          </div>
                                        <?php endforeach; ?>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="alert alert-warning">
                                Periksa kembali pemesanan Anda sebelum melanjutkan, apabila telah sesuai klik tombol lanjutkan untuk menuju proses selanjutnya
                              </div>
                              <button type="submit" class="btn btn-info pull-right">Lanjutkan <i class="fa fa-chevron-right"></i></button>
                            </form>
                          <?php endif; ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
