    <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
            <h1 class="h3 mb-0 text-gray-800">Manajemen Data</h1>
            <a href="#" data-toggle="modal" data-target="#akunModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th>ID-input</th>
                <th>tanggal</th>
                <th>permintaan</th>
                <th>persediaan</th>
                <th>produksi</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No.</th>
                <th>ID-input</th>
                <th>tanggal</th>
                <th>permintaan</th>
                <th>persediaan</th>
                <th>produksi</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
                <?php
                  $no=1;
                  foreach($row->result() as $key => $data){ ?>
            <tr>
                <td><?=$no++?></td>
                <td><?="IDP-00".$data->id_ip?></td>
                <td><?=$data->tanggal_ip?></td>
                <td><?=$data->permintaan?></td>
                <td><?=$data->persediaan?></td>
                <td><?=$data->produksi?></td>
                <td align="center">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#editModal<?=$data->id_ip?>"><i class="fas fa-pen fa-sm text-white-50"></i></a>
                    <a href="<?=site_url('AkunController/del/'.$data->id_ip)?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i></a>
                </td>
            </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>

   