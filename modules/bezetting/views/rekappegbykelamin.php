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
    <li><a href="#">bezetting jenis kelamin</a></li>
</ul>
<h4 class=" text-center title">Komposisi Pegawai Pemerintah Kabupaten Bandung Berdasar Jenis Kelamin </h4>
<div class="row ">
    <table id='sextable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead  >  
            <tr>
                <th><input style="display: none" /></th>
                <th><input style="width: 99%;border: 0px" class="noborder" /></th>
                <th rowspan="2"  >Jumlah</th>
                <th rowspan="2"  >Laki-laki</th>
                <th rowspan="2"  >Perempuan</th>
                <th rowspan="2"  >Grafik</th>
            </tr>
            <tr>
                <th>No</th>
                <th>SKPD</th>
                
            </tr>
        </thead>
        <tbody id="listroom" >
            <?php
            $i = 1;
            $tl = 0;
            $tp = 0;
            $dataurl = isset($jenisjabatan) && is_array($jenisjabatan) ? array('jenisjabatan' => implode(',', $jenisjabatan)) : '';

            foreach ($listagama as $es) {
                $tl += $es->l;
                $tp += $es->p;
                ?>
                <tr>
                    <td  align='center'><?php echo $i++; ?></td>
                    <td ><?php echo $es->satker; ?></td>
                    <td align='right'><?php echo $es->l + $es->p; ?></td>
                    <td align='right'><?php echo $es->l; ?></td>
                    <td align='right' ><?php echo $es->p; ?></td>
                    <td align='right'> 
                        <a class="icon-bar-chart" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/grafikjeniskelamin/<?php echo $es->satuan_kerja_id; ?>" title="<?php echo $es->satker; ?>"></a> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" align='right'>Total</td>
                <td align='right'><?php echo $tl; ?></td>
                <td align='right' ><?php echo $tp; ?></td>
                <td align='right' ><?php echo $tp + $tl; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="<?php echo base_url(); ?>/static/js/bezeting/komposisikelamin.js" type="text/javascript"></script> 