<!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Variabel Persediaan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th>tanggal</th>
                <th>(y) Sedikit</th>
                <th>(y) Sedang</th>
                <th>(y) Banyak</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No.</th>
                <th>tanggal</th>
                <th>(y) Sedikit</th>
                <th>(y) Sedang</th>
                <th>(y) Banyak</th>
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
                      $x2[$no] = $data->persediaan;
                    //   Himpunan Sedikit
                      if($x2[$no]<= $a21) {
                          $h21[$no] = 1;
                      }
                      else if($x2[$no]>= $a23) {
                          $h21[$no] = 0;
                      }
                      else{
                          $h21[$no] = ($a23 - $x2[$no])/($a23 - $a21);
                      }
                      $t21 = $h21[$no];
                    //   Himpunan Sedang
                      if($x2[$no]<= $a21 || $x2[$no]>= $a22) {
                          $h22[$no] = 0;
                      }
                      else if($x2[$no]>= $a21 && $x2[$no]<= $a23) {
                          $h22[$no] = ($x2[$no]-$a21)/($a23 - $a21);
                      }
                      else if($x2[$no]<= $a22 && $x2[$no]>= $a23) {
                          $h22[$no] = ($a22-$x2[$no])/($a22 - $a23);
                      }
                      $t22 = $h22[$no];
                    //   himpunan Banyak
                      if($x2[$no]>=$a22){
                          $h23[$no] = 1;
                      }
                      else if($x2[$no]<=$a23){
                          $h23[$no] = 0;
                      }
                      else{
                          $h23[$no] = ($x2[$no]-$a23)/($a22-$a23);
                      }
                      $t23 = $h23[$no];
                      ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data->tanggal_ip?></td>
                <td><?=round($t21,2)?></td>
                <td><?=round($t22,2)?></td>
                <td><?=round($t23,2)?></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>