    <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
            <h1 class="h3 mb-0 text-gray-800">Manajemen Akun</h1>
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
                <th>Username</th>
                <th>Password</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Password</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
                <?php
                  $no=1;
                  foreach($row->result() as $key => $data){ ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data->username?></td>
                <td><?=$data->password?></td>
                <td><?=$data->level == 1 ? "admin" : "user"?></td>
                <td align="center">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#editModal<?=$data->id?>"><i class="fas fa-pen fa-sm text-white-50"></i></a>
                    <a href="<?=site_url('AkunController/del/'.$data->id)?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i></a>
                </td>
            </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>

    <?php
    $no=0;
    foreach ($row->result() as $data) : $no++; ?>

  <div class="modal fade" id="editModal<?=$data->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

        <form class="user" action="<?=site_url('AkunController/edit')?>" method="post">
                      <input type="hidden" name="id" value="<?=$data->id?>">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control" id="exampleInputUsername" aria-describedby="UsernameHelp" value="<?=$data->username?>">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control" id="exampleInputPassword" placeholder="Masukan Password Baru">
                    </div>
                    <div class="form-group">
                      <select name="level" class="form-control form-control" id="exampleInputPassword">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                      </select>
                    </div>
                    <button type="submit" name="edit" class="btn btn-warning btn-block">
                      Edit
                    </button>
                    <hr>
                  </form>

        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>