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
<h4 class=" text-center title">Komposisi Pegawai Pemerintah Kabupaten Bandung Berdasar Usia </h4>
<div class="row ">
    <table id='usiatable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead  >            
            <tr>
                <th><input style="display: none" /></th>
                <th><input class="noborder" /></th>
                <th  rowspan="2"  align='center' >Jumlah</th>
                <th  rowspan="2" align='center' >16 - 20</th>
                <th  rowspan="2" align='center' >21 - 25</th>
                <th  rowspan="2" align='center' >26 - 30</th>
                <th  rowspan="2" align='center' >31 - 35</th>
                <th  rowspan="2" align='center' >36 - 40</th>
                <th  rowspan="2" align='center' >41 - 45</th>
                <th  rowspan="2" align='center' >46 - 50</th>
                <th  rowspan="2" align='center' >51 - 55</th>
                <th  rowspan="2" align='center' >56 - 60</th>
                <th  rowspan="2" align='center' > > 60</th>
                <th  rowspan="2" align='center' >Grafik</th>
            </tr>
            <tr>
                <th  align='center' >No</th>
                <th  align='center' >SKPD</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $dataurl = isset($jenisjabatan) && is_array($jenisjabatan) ? array('jenisjabatan' => implode(',', $jenisjabatan)) : '';
            $tu1620 = 0;
            $tu2125 = 0;
            $tu2630 = 0;
            $tu3135 = 0;
            $tu3640 = 0;
            $tu4145 = 0;
            $tu4650 = 0;
            $tu5155 = 0;
            $tu5660 = 0;
            $tu61 = 0;

            foreach ($listusia as $usia) {
                $tu1620 += $usia->u1620;
                $tu2125 += $usia->u2125;
                $tu2630 += $usia->u2630;
                $tu3135 += $usia->u3135;
                $tu3640 += $usia->u3640;
                $tu4145 += $usia->u4145;
                $tu4650 += $usia->u4650;
                $tu5155 += $usia->u5155;
                $tu5660 += $usia->u5660;
                $tu61 += $usia->u61;
                ?>
                <tr>
                    <td></td>
                    <td><?php echo $usia->satker; ?></td>
                    <td  align='right'><?php
                        echo $usia->u1620 + $usia->u2125 + $usia->u2630 + $usia->u3135 + $usia->u3640 + $usia->u4145 + $usia->u4650 + $usia->u5155 + $usia->u5660 + $usia->u61;
                        ?></td>
                    <td  align='right' ><?php echo $usia->u1620; ?></td>
                    <td  align='right' ><?php echo $usia->u2125; ?></td>
                    <td  align='right' ><?php echo $usia->u2630; ?></td>
                    <td  align='right' ><?php echo $usia->u3135; ?></td>
                    <td  align='right' ><?php echo $usia->u3640; ?></td>
                    <td  align='right'><?php echo $usia->u4145; ?></td>
                    <td  align='right'><?php echo $usia->u4650; ?></td>
                    <td  align='right'><?php echo $usia->u5155; ?></td>
                    <td  align='right'><?php echo $usia->u5660; ?></td>
                    <td  align='right'><?php echo $usia->u61; ?></td>
                    <td align='right'> 
                      <a class="icon-bar-chart" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/grafikusia/<?php echo $usia->satuan_kerja_id; ?>" title="<?php echo $usia->satker; ?>"></a> 
                     </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td align='right' colspan='3'>Total Seluruh SKPD</td>
                <td  align='right' ><?php echo $tu1620; ?></td>
                <td  align='right' ><?php echo $tu2125; ?></td>
                <td  align='right' ><?php echo $tu2630; ?></td>
                <td  align='right' ><?php echo $tu3135; ?></td>
                <td  align='right' ><?php echo $tu3640; ?></td>
                <td  align='right' ><?php echo $tu4145; ?></td>
                <td  align='right' ><?php echo $tu4650; ?></td>
                <td  align='right' ><?php echo $tu5155; ?></td>
                <td  align='right' ><?php echo $tu5660; ?></td>
                <td  align='right' ><?php echo $tu61; ?></td>
                <td  align='right' ><?php echo $tu1620 + $tu2125 + $tu2630 + $tu3135 + $tu3640 + $tu4145 + $tu4650 + $tu5155 + $tu5660 + $tu61; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="<?php echo base_url(); ?>/static/js/bezeting/komposisiusia.js" type="text/javascript"></script> 