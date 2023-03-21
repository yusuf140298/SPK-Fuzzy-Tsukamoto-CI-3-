   <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Variabel Permintaan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th>tanggal</th>
                <th>(x) Sedikit</th>
                <th>(x) Sedang</th>
                <th>(x) Banyak</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No.</th>
                <th>tanggal</th>
                <th>(x) Sedikit</th>
                <th>(x) Sedang</th>
                <th>(x) Banyak</th>
            </tr>
            </tfoot>
            <tbody>
                <?php
                    foreach 
                    ($tampil1->result() as $data) :
                    $a11 = $data->minpermintaan;
                    $a12 = $data->maxpermintaan;
                    $i1 = ($a12 - $a11)/2;
                    $a13 = $a11+$i1;
                    $a14 = $a11+($i1/2);
                    $a15 = $a13+($i1/2); 
                    endforeach;
                    foreach ($tampil2->result() as $data) :
                    $a21 = $data->minpersediaan;
                    $a22 = $data->maxpersediaan;
                    $i2 = ($a22 - $a21)/2;
                    $a23 = $a21+$i2;
                    $a24 = $a21+($i2/2);
                    $a25 = $a23+($i2/2); 
                    endforeach;
                    foreach ($tampil3->result() as $data) :
                    $a31 = $data->minproduksi;
                    $a32 = $data->maxproduksi;
                    $i3 = ($a32 - $a31)/2;
                    $a33 = $a31+$i3;
                    $a34 = $a31+($i3/2);
                    $a35 = $a33+($i3/2); 
                    endforeach;
                  $no=1;
                  foreach($row->result() as $key => $data){ 
                      $x1[$no] = $data->permintaan;
                    //   Himpunan Sedikit
                      if($x1[$no]<= $a11) {
                          $h11[$no] = 1;
                      }
                      else if($x1[$no]>= $a13) {
                          $h11[$no] = 0;
                      }
                      else{
                          $h11[$no] = ($a13 - $x1[$no])/($a13 - $a11);
                      }
                      $t11 = $h11[$no];
                    //   Himpunan Sedang
                      if($x1[$no]<= $a11 || $x1[$no]>= $a12) {
                          $h12[$no] = 0;
                      }
                      else if($x1[$no]>= $a11 && $x1[$no]<= $a13) {
                          $h12[$no] = ($x1[$no]-$a11)/($a13 - $a11);
                      }
                      else if($x1[$no]<= $a12 && $x1[$no]>= $a13) {
                          $h12[$no] = ($a12-$x1[$no])/($a12 - $a13);
                      }
                      $t12 = $h12[$no];
                    //   himpunan Banyak
                      if($x1[$no]>=$a12){
                          $h13[$no] = 1;
                      }
                      else if($x1[$no]<=$a13){
                          $h13[$no] = 0;
                      }
                      else{
                          $h13[$no] = ($x1[$no]-$a13)/($a12-$a13);
                      }
                      $t13 = $h13[$no];
                      ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data->tanggal_ip?></td>
                <td><?=round($t11,2)?></td>
                <td><?=round($t12,2)?></td>
                <td><?=round($t13,2)?></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>