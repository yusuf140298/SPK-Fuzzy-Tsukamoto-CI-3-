    <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
            <h1 class="h3 mb-0 text-gray-800">Halaman Input Sistem Pendukung Keputusan</h1>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">

    <div class="row">
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-header" align="center"><strong class="text-primary">Menentukan Jumlah Produksi </strong></div>
							<div class="card-body">
								<form action="<?=site_url('ProduksiController/hitung')?>" id="form-tambah" method="POST">
									<?php 
									$no=1;
									foreach ($row->result() as $data) :
										$tampil = $data->id_ip;
										$id = $tampil+$no;
									endforeach;?>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="kode"><strong>Kode Data</strong></label>
											<input type="text" name="id" placeholder="Masukkan Kode Data" autocomplete="off"  class="form-control" required value="IDP - 000<?=$id?> " maxlength="8" readonly>
											<input type="hidden" name="kode" value="<?=$id?>">
										</div>
										<div class="form-group col-md-6">
											<label><strong>Tanggal</strong></label>
											<input type="text" name="tgl_keluar" value="<?= date('d/m/Y') ?>" class="form-control datetimepicker-input">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="username"><strong>Permintaan</strong></label>
											<input type="number" name="permintaan" min="1" placeholder="Masukkan Jumlah Persediaan" autocomplete="off"  class="form-control" required>
										</div>
										<div class="form-group col-md-6">
											<label for="password"><strong>Persediaan</strong></label>
											<input type="number" name="persediaan" min="1" placeholder="Masukkan Jumlah Permintaan" autocomplete="off"  class="form-control" required>
										</div>
                                        <!-- <div class="form-group col-md-4">
											<label for="password"><strong>Produksi</strong></label>
											<input type="number" name="produksi" placeholder="Masukkan Jumlah Produksi" autocomplete="off"  class="form-control" required>
										</div> -->
									</div>
									<hr>
									<div class="form-group" style="float:right;">
										<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-sync"></i>&nbsp;&nbsp;Tentukan Produksi</button>
									</div>
								</form>
							</div>				
						</div>
					</div>
				</div>

    </div>