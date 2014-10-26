<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
        <i class="icon-angle-right"></i>
    </li>     
    <li>
        <a href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/index">bezetting </a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">bezetting usia</a></li>
</ul>
<h4 class=" text-center title">Komposisi Pegawai Pemerintah Kabupaten Bandung Berdasar Pendidikan </h4>
<div class="row ">
    <table id='pendidikantable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead>            
            <tr>
                <th><input style="display: none" /></th>
                <th><input class="noborder" /></th>
                <th  rowspan="2"  >Jumlah</th>
                <th  rowspan="2"  >SD</th>
                <th rowspan="2"  >SLTP</th>
                <th rowspan="2"  >SLTP KEJURUAN</th>
                <th rowspan="2"  >SLTA UMUM</th>
                <th rowspan="2"  >SLTA KEJURUAN</th>
                <th rowspan="2"  >DIPLOMA I</th>
                <th rowspan="2"  >DIPLOMA II</th>
                <th rowspan="2"  >SARJANA MUDA</th>
                <th rowspan="2"  >DIPLOMA III</th>
                <th rowspan="2"  >DIPLOMA IV</th>
                <th rowspan="2"  >SARJANA</th>
                <th rowspan="2"  >SPESIALIS I</th>
                <th rowspan="2"  >PASCASARJANA</th>
                <th rowspan="2"  >DOKTOR</th>
                <th rowspan="2"  >GRAFIK</th>
            </tr>
            <tr>
                <th>NO</th>
                <th>SKPD</th>

            </tr>
        </thead>
        <tbody id="listroom" >
            <?php
            $dataurl = isset($jenisjabatan) && is_array($jenisjabatan) ? array('jenisjabatan' => implode(',', $jenisjabatan)) : '';
            $i = 1;
            $tsd = 0;
            $tsmp = 0;
            $tsmpk = 0;
            $tsmu = 0;
            $tsmk = 0;
            $td1 = 0;
            $td2 = 0;
            $tsmuda = 0;
            $td3 = 0;
            $td4 = 0;
            $ts1 = 0;
            $tsp2 = 0;
            $ts2 = 0;
            $ts3 = 0;
            foreach ($listusia as $usia) {
                $tsd +=$usia->sd;
                $tsmp +=$usia->smp;
                $tsmpk +=$usia->smpk;
                $tsmu +=$usia->smu;
                $tsmk +=$usia->smk;
                $td1 +=$usia->d1;
                $td2 +=$usia->d2;
                $tsmuda +=$usia->smuda;
                $td3 +=$usia->d3;
                $td4 +=$usia->d4;
                $ts1 +=$usia->s1;
                $tsp2 +=$usia->sp2;
                $ts2 +=$usia->s2;
                $ts3 +=$usia->s3;
                ?>
                <tr>
                    <td align='center'><?php echo $i++; ?></td>
                    <td><?php echo $usia->satker; ?></td>
                    <td align='right' ><?php
                        echo $usia->sd + $usia->smp + $usia->smpk + $usia->smu + $usia->smk + $usia->d1 + $usia->d2 + $usia->smuda + $usia->d3 + $usia->d4 + $usia->s1 + $usia->sp2 + $usia->s2 + $usia->s3;
                        ?></td>
                    <td align='right' ><?php echo $usia->sd; ?></td>
                    <td align='right'><?php echo $usia->smp; ?></td>
                    <td align='right' ><?php echo $usia->smpk; ?></td>
                    <td align='right' ><?php echo $usia->smu; ?></td>
                    <td align='right' ><?php echo $usia->smk; ?></td>
                    <td align='right' ><?php echo $usia->d1; ?></td>
                    <td align='right' ><?php echo $usia->d2; ?></td>
                    <td align='right' ><?php echo $usia->smuda; ?></td>
                    <td align='right' ><?php echo $usia->d3; ?></td>
                    <td align='right' ><?php echo $usia->d4; ?></td>
                    <td align='right' ><?php echo $usia->s1; ?></td>
                    <td align='right'><?php echo $usia->sp2; ?></td>
                    <td align='right' ><?php echo $usia->s2; ?></td>
                    <td align='right' ><?php echo $usia->s3; ?></td>
                    <td align='right'> 
                        <a class="icon-bar-chart" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/grafikpendidikan/<?php echo $usia->satuan_kerja_id; ?>" title="<?php echo $usia->satker; ?>"></a> 
                    </td>

                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td align='right' colspan="3">Total Seluruh SKPD</td>
                <td align='right' ><?php echo $tsd; ?></td>
                <td align='right'><?php echo $tsmp; ?></td>
                <td align='right' ><?php echo $tsmpk; ?></td>
                <td align='right' ><?php echo $tsmu; ?></td>
                <td align='right' ><?php echo $tsmk; ?></td>
                <td align='right' ><?php echo $td1; ?></td>
                <td align='right' ><?php echo $td2; ?></td>
                <td align='right' ><?php echo $tsmuda; ?></td>
                <td align='right' ><?php echo $td3; ?></td>
                <td align='right' ><?php echo $td4; ?></td>
                <td align='right' ><?php echo $ts1; ?></td>
                <td align='right'><?php echo $tsp2; ?></td>
                <td align='right' ><?php echo $ts2; ?></td>
                <td align='right' ><?php echo $ts3; ?></td>
                <td align='right' ><?php echo $ts3 + $ts2 + $tsp2 + $ts1 + $td4 + $td3 + $tsmuda + $td2 + $td1 + $tsmk + $tsmu + $tsmpk + $tsmp + $tsd; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="<?php echo base_url(); ?>/static/js/bezeting/komposisipendidikan.js" type="text/javascript"></script> 