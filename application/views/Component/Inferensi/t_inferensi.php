   <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Inferensi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th>tanggal</th>
                <th>a1</th>
                <th>a2</th>
                <th>a3</th>
                <th>a4</th>
                <th>a5</th>
                <th>a6</th>
                <th>a7</th>
                <th>a8</th>
                <th>a9</th>
                <th>z1</th>
                <th>z2</th>
                <th>z3</th>
                <th>z4</th>
                <th>z5</th>
                <th>z6</th>
                <th>z7</th>
                <th>z8</th>
                <th>z9</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No.</th>
                <th>tanggal</th>
                <th>a1</th>
                <th>a2</th>
                <th>a3</th>
                <th>a4</th>
                <th>a5</th>
                <th>a6</th>
                <th>a7</th>
                <th>a8</th>
                <th>a9</th>
                <th>z1</th>
                <th>z2</th>
                <th>z3</th>
                <th>z4</th>
                <th>z5</th>
                <th>z6</th>
                <th>z7</th>
                <th>z8</th>
                <th>z9</th>
                
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
                    
                    //   Var Permintaan

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

                    //   Var Persediaan

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

                    //   x3
                    $x3[$no] = $data->produksi;

                    //   sedikit and sedikit then sedikit
                      $r1[$no] = min($h11[$no],$h21[$no]);
                      if ($r1[$no]==0){
                          $z1[$no] = $a33;   
                      }else if ($r1[$no]==1){
                          $z1[$no] = $a31;
                      }else{
                          $z1[$no] = $a33 - ($r1[$no]*($a33-$a31));
                      }
                    //   sedikit and sedang then sedikit
                    $r2[$no] = min($h11[$no],$h22[$no]);
                    if($r2[$no]==0){
                        $z2[$no] = $a33;
                    }else if($r2[$no]==1){
                        $z2[$no] = $a31;
                    }else{
                        $z2[$no] = $a33 - ($r2[$no]*($a33-$a31));
                    }
                    //   sedikit and banyak then sedikit
                    $r3[$no] = min($h11[$no],$h23[$no]);
                    if($r3[$no]==0){
                        $z3[$no] = $a33;
                    }else if($r3[$no]==1){
                        $z3[$no] = $a31;
                    }else{
                        $z3[$no] = $a33 - ($r4[$no]*($a33-$a31));
                         
                    }
                    //   sedang and sedikit then sedang
                    $r4[$no] = min($h12[$no],$h21[$no]);
                    if($r4[$no]==0 && ($x3[$no]>= $a31 && $x3[$no]<= $a33)){
                        $z4[$no] = $a31;
                    }else if($r4[$no]==0 && ($x3[$no]<= $a32 && $x3[$no]>= $a33)){
                        $z4[$no] = $a32;
                    }else if($r4[$no]==1 && ($x3[$no]>= $a31 && $x3[$no]<= $a33)){
                        $z4[$no] = $a33;
                    }else if($r4[$no]==1 && ($x3[$no]<= $a32 && $x3[$no]>= $a33)){
                        $z4[$no] = $a33;
                    }else{
                        if($x3[$no]>= $a31 && $x3[$no]<= $a33){
                            $z4[$no] = $a31 + ($r4[$no]*($a33-$a31));
                        }
                        if($x3[$no]<= $a32 && $x3[$no]>= $a33){
                            $z4[$no] = $a32 - ($r4[$no]*($a32-$a33));
                        }
                    }
                    //   sedang and sedang then sedang
                    $r5[$no] = min($h12[$no],$h22[$no]);
                    if($r5[$no]==0 && ($x3[$no]>= $a31 && $x3[$no]<= $a33)){
                        $z5[$no] = $a31;
                    }else if($r5[$no]==0 && ($x3[$no]<= $a32 && $x3[$no]>= $a33)){
                        $z5[$no] = $a32;
                    }else if($r5[$no]==1 && ($x3[$no]>= $a31 && $x3[$no]<= $a33)){
                        $z5[$no] = $a33;
                    }else if($r5[$no]==1 && ($x3[$no]<= $a32 && $x3[$no]>= $a33)){
                        $z5[$no] = $a33;
                    }else{
                        if($x3[$no]>= $a31 && $x3[$no]<= $a33){
                            $z5[$no] = $a31 + ($r5[$no]*($a33-$a31));
                        }
                        if($x3[$no]<= $a32 && $x3[$no]>= $a33){
                            $z5[$no] = $a32 - ($r5[$no]*($a32-$a33));
                        }
                    }
                    //   sedang and banyak then sedang
                    $r6[$no] = min($h12[$no],$h23[$no]);
                    if($r6[$no]==0 && ($x3[$no]>= $a31 && $x3[$no]<= $a33)){
                        $z6[$no] = $a31;
                    }else if($r6[$no]==0 && ($x3[$no]<= $a32 && $x3[$no]>= $a33)){
                        $z6[$no] = $a32;
                    }else if($r6[$no]==1 && ($x3[$no]>= $a31 && $x3[$no]<= $a33)){
                        $z6[$no] = $a33;
                    }else if($r6[$no]==1 && ($x3[$no]<= $a32 && $x3[$no]>= $a33)){
                        $z6[$no] = $a33;
                    }else{
                        if($x3[$no]>= $a31 && $x3[$no]<= $a33){
                            $z6[$no] = $a31 + ($r6[$no]*($a33-$a31));
                        }
                        if($x3[$no]<= $a32 && $x3[$no]>= $a33){
                            $z6[$no] = $a32 - ($r6[$no]*($a32-$a33));
                        }
                    }
                    //   banyak and sedikit then sedang
                    $r7[$no] = min($h13[$no],$h21[$no]);
                    if($r7[$no]==0 && ($x3[$no]>= $a31 && $x3[$no]<= $a33)){
                        $z7[$no] = $a31;
                    }else if($r7[$no]==0 && ($x3[$no]<= $a32 && $x3[$no]>= $a33)){
                        $z7[$no] = $a32;
                    }else if($r7[$no]==1 && ($x3[$no]>= $a31 && $x3[$no]<= $a33)){
                        $z7[$no] = $a33;
                    }else if($r7[$no]==1 && ($x3[$no]<= $a32 && $x3[$no]>= $a33)){
                        $z7[$no] = $a33;
                    }else{
                        if($x3[$no]>= $a31 && $x3[$no]<= $a33){
                            $z7[$no] = $a31 + ($r7[$no]*($a33-$a31));
                        }
                        if($x3[$no]<= $a32 && $x3[$no]>= $a33){
                            $z7[$no] = $a32 - ($r7[$no]*($a32-$a33));
                        }
                    }
                    //   banyak and sedang then banyak
                    $r8[$no] = min($h13[$no],$h22[$no]);
                    if($r8[$no]==0){
                        $z8[$no] = $a33;
                    }else if($r8[$no]==1){
                        $z8[$no] = $a32;
                    }else{
                        $z8[$no] = $a33 + ($r8[$no]*($a32-$a33));
                    }
                    //   banyak and banyak then banyak
                    $r9[$no] = min($h13[$no],$h23[$no]);
                    if($r9[$no]==0){
                        $z9[$no] = $a33;
                    }else if($r9[$no]==1){
                        $z9[$no] = $a32;
                    }else{
                        $z9[$no] = $a33 + ($r9[$no]*($a32-$a33));
                    }
                    $in1 = $r1[$no];
                    $in2 = $r2[$no];
                    $in3 = $r3[$no];
                    $in4 = $r4[$no];
                    $in5 = $r5[$no];
                    $in6 = $r6[$no];
                    $in7 = $r7[$no];
                    $in8 = $r8[$no];
                    $in9 = $r9[$no];
                    $iz1 = $z1[$no];
                    $iz2 = $z2[$no];
                    $iz3 = $z3[$no];
                    $iz4 = $z4[$no];
                    $iz5 = $z5[$no];
                    $iz6 = $z6[$no];
                    $iz7 = $z7[$no];
                    $iz8 = $z8[$no];
                    $iz9 = $z9[$no];  
                      ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data->tanggal_ip?></td>
                <td><?=round($in1,2)?></td>
                <td><?=round($in2,2)?></td>
                <td><?=round($in3,2)?></td>
                <td><?=round($in4,2)?></td>
                <td><?=round($in5,2)?></td>
                <td><?=round($in6,2)?></td>
                <td><?=round($in7,2)?></td>
                <td><?=round($in8,2)?></td>
                <td><?=round($in9,2)?></td>
                <td><?=round($iz1,2)?></td>
                <td><?=round($iz2,2)?></td>
                <td><?=round($iz3,2)?></td>
                <td><?=round($iz4,2)?></td>
                <td><?=round($iz5,2)?></td>
                <td><?=round($iz6,2)?></td>
                <td><?=round($iz7,2)?></td>
                <td><?=round($iz8,2)?></td>
                <td><?=round($iz9,2)?></td>


            </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>