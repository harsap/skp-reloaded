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
    <li><a href="#">bezetting pangkat</a></li>
</ul>
<h4 class=" text-center title">Komposisi Pegawai Pemerintah Kabupaten Bandung Berdasar Pangkat </h4>
<div class="row ">
    <table id='pangkattable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead  >  
            <tr>
                <th><input style="display: none" /></th>
                <th><input class="noborder" /></th>
                <th rowspan="2"  >Jumlah</th>
                <th rowspan="2"  >I/a</th>
                <th rowspan="2"  >I/b</th>
                <th rowspan="2"  >I/c</th>
                <th rowspan="2"  >I/d</th>
                <th rowspan="2"  >II/a</th>
                <th rowspan="2"  >II/b</th>
                <th rowspan="2"  >II/c</th>
                <th rowspan="2"  >II/d</th>
                <th rowspan="2"  >III/a</th>
                <th rowspan="2"  >III/b</th>
                <th rowspan="2"  >III/c</th>
                <th rowspan="2"  >III/d</th>
                <th rowspan="2"  >IV/a</th>
                <th rowspan="2"  >IV/b</th>
                <th rowspan="2"  >IV/c</th>
                <th rowspan="2"  >IV/d</th>
                <th rowspan="2"  >IV/e</th>
                <th rowspan="2"  >GRAFIK</th>
            </tr>
            <tr>
                <th>No</th>
                <th>SKPD</th>
                
            </tr>
        </thead>
        <tbody>
             <?php
            
            $ta1 = 0;
            $tb1 = 0;
            $tc1 = 0;
            $td1 = 0;
            $ta2 = 0;
            $tb2 = 0;
            $tc2 = 0;
            $td2 = 0;
            $ta3 = 0;
            $tb3 = 0;
            $tc3 = 0;
            $td3 = 0;
            $ta4 = 0;
            $tb4 = 0;
            $tc4 = 0;
            $td4 = 0;
            $te4 = 0;
            $i = 1;
            foreach ($listusia as $usia) {
                $ta1 += $usia->a1;
                $tb1 += $usia->b1;
                $tc1 += $usia->c1;
                $td1 += $usia->d1;
                $ta2 += $usia->a2;
                $tb2 += $usia->b2;
                $tc2 += $usia->c2;
                $td2 += $usia->d2;
                $ta3 += $usia->a3;
                $tb3 += $usia->b3;
                $tc3 += $usia->c3;
                $td3 += $usia->d3;
                $ta4 += $usia->a4;
                $tb4 += $usia->b4;
                $tc4 += $usia->c4;
                $td4 += $usia->d4;
                $te4 += $usia->e4;
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $usia->satker; ?></td>
                    <td align='right'><?php
            echo $usia->a1 + $usia->b1 + $usia->c1 + $usia->d1 + $usia->a2 + $usia->b2 +
            $usia->c2 + $usia->d2 + $usia->a3 + $usia->b3 + $usia->c3 + $usia->d3 + $usia->a4
            + $usia->b4 + $usia->c4 + $usia->d4 + $usia->e4;
                ?></td>
                    <td  align='right'><?php echo $usia->a1; ?></td>
                    <td  align='right' ><?php echo $usia->b1; ?></td>
                    <td  align='right' ><?php echo $usia->c1; ?></td>
                    <td  align='right' ><?php echo $usia->d1; ?></td>
                    <td  align='right' ><?php echo $usia->a2; ?></td>
                    <td  align='right' ><?php echo $usia->b2; ?></td>
                    <td  align='right' ><?php echo $usia->c2; ?></td>
                    <td  align='right' ><?php echo $usia->d2; ?></td>
                    <td  align='right' ><?php echo $usia->a3; ?></td>
                    <td  align='right' ><?php echo $usia->b3; ?></td>
                    <td  align='right' ><?php echo $usia->c3; ?></td>
                    <td  align='right' ><?php echo $usia->d3; ?></td>
                    <td  align='right' ><?php echo $usia->a4; ?></td>
                    <td  align='right' ><?php echo $usia->b4; ?></td>
                    <td  align='right' ><?php echo $usia->c4; ?></td>
                    <td  align='right' ><?php echo $usia->d4; ?></td>
                    <td  align='right' ><?php echo $usia->e4; ?></td>
                    <td align='right'>    
                        <a class="icon-bar-chart" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/grafikpangkat/<?php echo $usia->satuan_kerja_id; ?>" title="<?php echo $usia->satker; ?>"></a> 
                   </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr> 
                <td colspan='3' align='right'>Total Seluruh SKPD</td>
                <td><?php echo $ta1; ?></td>
                <td><?php echo $tb1; ?></td>
                <td><?php echo $tc1; ?></td>
                <td><?php echo $td1; ?></td>
                <td><?php echo $ta2; ?></td>
                <td><?php echo $tb2; ?></td>
                <td><?php echo $tc2; ?></td>
                <td><?php echo $td2; ?></td>
                <td><?php echo $ta3; ?></td>
                <td><?php echo $tb3; ?></td>
                <td><?php echo $tc3; ?></td>
                <td><?php echo $td3; ?></td>
                <td><?php echo $ta4; ?></td>
                <td><?php echo $tb4; ?></td>
                <td><?php echo $tc4; ?></td>
                <td><?php echo $td4; ?></td>
                <td><?php echo $te4; ?></td>
                <td><?php echo $te4 + $ta1 + $tb1 + $tc1 + $td1 + $ta2 + $tb2 + $tc2 + $td2 + $ta3 + $tb3 + $tc3 + $td3 + $ta4 + $tb4 + $tc4 + $td4; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
 <script src="<?php echo base_url(); ?>/static/js/bezeting/komposisipangkat.js" type="text/javascript"></script> 