<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
        <i class="icon-angle-right"></i>
    </li>    

    <li><a href="#">Matriks Struktural</a></li>
</ul>
<h4 class=" text-center title">Matriks Struktural Pegawai Pemerintah Kabupaten Bandung</h4>
<div class="row ">
    <table id='mtxtable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Golongan Pangkat</th>
                <th colspan="10">Struktural</th>
                <th rowspan="2">JFU</th>
                <th rowspan="2">JFK</th>
                <th rowspan="2">Jumlah</th>
            </tr>
            <tr>
                <th>I.a</th>
                <th>I.b</th>
                <th>II.a</th>
                <th>II.b</th>
                <th>III.a</th>
                <th>III.b</th>
                <th>IV.a</th>
                <th>IV.b</th>
                <th>V.a</th>
                <th>V.b</th>
            </tr>
        </thead>
        <tbody id="listroom" >
            <?php
            $i = 1;
            $tia = 0;
            $tib = 0;
            $tiia = 0;
            $tiib = 0;
            $tiiia = 0;
            $tiiib = 0;
            $tiva = 0;
            $tivb = 0;
            $tva = 0;
            $tvb = 0;
            $tfu = 0;
            $tft = 0;
            foreach ($listmt as $es) {
                $tia += $es->ia;
                $tib += $es->ib;
                $tiia += $es->iia;
                $tiib += $es->iib;
                $tiiia += $es->iiia;
                $tiiib += $es->iiib;
                $tiva += $es->iva;
                $tivb += $es->ivb;
                $tva += $es->va;
                $tvb += $es->vb;
                $tfu += $es->fu;
                $tft += $es->ft;
                ?>
                <tr>
                    <td  align='center'><?php echo $i++; ?></td>
                    <td ><?php echo $es->nm_gol; ?></td>
                    <td align='right'><?php echo $es->ia; ?></td>
                    <td align='right' ><?php echo $es->ib; ?></td>
                    <td align='right' ><?php echo $es->iia; ?></td>
                    <td align='right' ><?php echo $es->iib; ?></td>
                    <td align='right' ><?php echo $es->iiia; ?></td>
                    <td align='right'><?php echo $es->iiib; ?></td>
                    <td align='right' ><?php echo $es->iva; ?></td>
                    <td align='right' ><?php echo $es->ivb; ?></td>
                    <td align='right' ><?php echo $es->va; ?></td>
                    <td align='right' ><?php echo $es->vb; ?></td>
                    <td align='right' ><?php echo $es->fu; ?></td>
                    <td align='right' ><?php echo $es->ft; ?></td>
                    <td align='right'><?php echo $es->ia + $es->ib + $es->iia + $es->iib + $es->iiia + $es->iiib + $es->iva + $es->ivb + $es->va + $es->vb + $es->fu + $es->ft; ?></td>

                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td align='right'> </td>
                <td  align='right' >Total</td>
                <td align='right'> <?php echo $tia; ?></td>
                <td align='right'> <?php echo $tib; ?></td>
                <td align='right'> <?php echo $tiia; ?></td>
                <td align='right'> <?php echo $tiib; ?></td>
                <td align='right'><?php echo $tiiia; ?></td>
                <td align='right'> <?php echo $tiiib; ?></td>
                <td align='right'>  <?php echo $tiva; ?></td>
                <td align='right'> <?php echo $tivb; ?></td>
                <td align='right'>  <?php echo $tva; ?></td>
                <td align='right'> <?php echo $tvb; ?></td>
                <td align='right'> <?php echo $tfu; ?></td>
                <td align='right'> <?php echo $tft; ?></td>
                <td align='right'> <?php echo $tvb + $tva + $tivb + $tiva + $tiiib + $tiiia + $tiib + $tiia + $tib + $tia + $tfu + $tft; ?></td>
            </tr>
        </tfoot>
    </table>
</div>

<script src="<?php echo base_url(); ?>/static/js/bezeting/matriks.js" type="text/javascript"></script>  



