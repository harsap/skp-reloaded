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
<h4 class=" text-center title">Komposisi Pegawai Pemerintah Kabupaten Bandung Berdasar Jenis Jabatan </h4>
<div class="row ">
    <table id='agamatable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead  >  
            <tr>
                <th><input style="display: none" /></th>
                <th><input class="noborder" /></th>
                <th  rowspan="2" >Jumlah</th>
                <th  rowspan="2" >Struktural</th>
                <th  rowspan="2" >Fungsional Tertentu</th>
                <th  rowspan="2" >Fungsional Umum</th>
                <th  rowspan="2" >Belum Ada Jabatan</th>
                <th  rowspan="2" >Grafik</th>
            </tr>
            <tr>
                <th>No</th>
                <th>SKPD</th>
               
            </tr>
        </thead>
        <tbody id="listroom" >
            <?php
            $i = 1;
            $tpolitik = 0;
            $tstruktural = 0;
            $tft = 0;
            $tfu = 0;
            $tbelum = 0;
            $dataurl = isset($jenisjabatan) && is_array($jenisjabatan) ? array('jenisjabatan' => implode(',', $jenisjabatan)) : '';

            foreach ($listjenis as $es) {
                $tpolitik +=$es->politik;
                $tstruktural +=$es->struktural;
                $tft +=$es->ft;
                $tfu +=$es->fu;
                $tbelum +=$es->belum;
                ?>
                <tr>
                    <td  align='center'><?php echo $i++; ?></td>
                    <td ><?php echo $es->satker; ?></td>
                    <td align='right'><?php echo $es->politik + $es->struktural + $es->ft + $es->fu + $es->belum; ?></td>
                    <td align='right' ><?php echo $es->struktural; ?></td>
                    <td align='right' ><?php echo $es->ft; ?></td>
                    <td align='right' ><?php echo $es->fu; ?></td>
                    <td align='right' ><?php echo $es->belum; ?></td>
                    <td align='right'>
                             <a class="icon-bar-chart" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/grafikjenisjabatan/<?php echo $es->satuan_kerja_id; ?>" title="<?php echo $es->satker; ?>"></a> 
                     </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot> <tr>
                <td  align='right' colspan="3">Total Seluruh SKPD</td>           
                <td align='right'> <?php echo $tstruktural; ?></td>
                <td align='right'> <?php echo $tft; ?></td>
                <td align='right'> <?php echo $tfu; ?></td>
                <td align='right'><?php echo $tbelum; ?></td>
                <td align='right'><?php echo $tbelum + $tfu + $tft + $tstruktural; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="<?php echo base_url(); ?>/static/js/bezeting/komposisijenisjabatan.js" type="text/javascript"></script> 