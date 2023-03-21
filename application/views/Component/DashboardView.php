

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Sistem Pendukung Keputusan</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

        
                    
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Akun</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Produksi(Aktual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Produksi (Tsukamoto)</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Prosentase Akurasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">   
            <div class="card shadow col-md-8 mb-4">
              <div class="card-header" align="center">
              <strong class="text-primary">Domain Data</strong>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th style="width:5%">No.</th>
                        <th>Variabel</th>
                        <th>Sedikit</th>
                        <th>Sedang</th>
                        <th>Banyak</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Variabel</th>
                        <th>Sedikit</th>
                        <th>Sedang</th>
                        <th>Banyak</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                        $no=0;
                        foreach ($tampil1->result() as $data) : $no++;
                        $a = $data->minpermintaan;
                        $b = $data->maxpermintaan;
                        $i = ($b - $a)/2;
                        $c = $a+$i;
                        $d = $a+($i/2);
                        $e = $c+($i/2)  
                        ?>   
                    <tr>
                        <td>1</td>
                        <td>Permintaan</td>
                        <td><?= $a." - ".$c?></td>
                        <td><?= $a." - ".$b?></td>
                        <td><?= $c." - ".$b?></td>
                    </tr>
                  <?php endforeach; ?>
                  <?php
                        $no=0;
                        foreach ($tampil2->result() as $data) : $no++;
                        $a = $data->minpersediaan;
                        $b = $data->maxpersediaan;
                        $i = ($b - $a)/2;
                        $c = $a+$i;
                        $d = $a+($i/2);
                        $e = $c+($i/2)  
                        ?> 
                      <tr>
                          <td>2</td>
                          <td>Persediaan</td>
                          <td><?= $a." - ".$c?></td>
                          <td><?= $a." - ".$b?></td>
                          <td><?= $c." - ".$b?></td>
                      </tr>
                  <?php endforeach; ?>
                  <?php
                  $no=0;
                  foreach ($tampil3->result() as $data) : $no++;
                  $a = $data->minproduksi;
                  $b = $data->maxproduksi;
                  $i = ($b - $a)/2;
                  $c = $a+$i;
                  $d = $a+($i/2);
                  $e = $c+($i/2);  
                  ?> 
                  <tr>
                      <td>3</td>
                      <td>Produksi</td>
                      <td><?= $a." - ".$c?></td>
                      <td><?= $a." - ".$b?></td>
                      <td><?= $c." - ".$b?></td>
                  </tr>
                  <?php endforeach; ?>       
                  </tbody>
              </table>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Cart Produksi</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myPieChart" width="301" height="245" style="display: block; width: 301px; height: 245px;" class="chartjs-render-monitor"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Banyak
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Sedang
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Sedikit
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        