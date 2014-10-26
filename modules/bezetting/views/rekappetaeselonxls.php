<?php
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,
        pre-check=0");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=peta-eselon-kab-badg-" . date('d-m-y') . ".xls");
?>
<html>
    <head>
        <style type="text/css">
            @media all {
                @page {
                    size:F4  landscape ;
                }
                p {
                    page-break-after:always;
                }
                input {
                    display:none;
                }
                a{display:none;}
                #footer{display:none;}
            }
            #footpanel{background:none;}

            .datatableprint {
                border:1px  solid  black;
                border-collapse:collapse;
                width:100%;
            }
            .datatableprint caption {
                color:#33517A;
                font:bold 0.75em Arial, Helvetica, sans-serif;
                padding-bottom:8px;
                padding-top:3px;
                text-align:center;
            }
            .datatableprint td {
                border:1px  solid  black;
                padding:4px;
                font-weight:normal;
            }
            .datatableprint th {
                border:1px  solid  black;
                font-weight:bold;
                padding-left:4px;
                text-align:center;
                text-transform:uppercase;
                background-color: #d0d0f0;
                padding: 5px;
            }
            .datatableprint tfoot {
                border:1px  solid  black;
                font-weight:bold;
                padding-left:4px;
                text-align:center;
                text-transform:uppercase;
            }
            .label2{color:#333;}
            .label2{clear:left;cursor:hand;display:block;float:left;margin-right:1em;text-align:left;width:64em;font-weight:bold;}
            .hurufmerah {
                color: red;
                border-color: #ed4e2a;
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table class="datatableprint" >
            <caption>PETA ESELON PEMERINTAH KABUPATEN BANDUNG TAHUN <?php echo date('Y'); ?></caption>
            <thead>
                <tr>
                    <th rowspan="3">No</th>
                    <th rowspan="3">SKPD </th> 
                    <th colspan="9" >JUMLAH ESELON SELURUHNYA</th>
                    <th colspan="9" >JUMLAH ESELON TERISI</th>
                    <th rowspan="3">JUMLAH ESELON BELUM TERISI </th> 
                </tr>
                <tr>
                    <th colspan="2" >II</th>
                    <th colspan="2">III </th> 
                    <th  colspan="2" >IV</th>
                    <th  colspan="2">V</th>
                    <th rowspan="2">TOTAL</th>
                    <th colspan="2" >II</th>
                    <th colspan="2">III </th> 
                    <th  colspan="2" >IV</th>
                    <th  colspan="2">V</th>
                    <th  rowspan="2">TOTAL</th>
                </tr>
                <tr>
                    <th >A</th>
                    <th >B</th>
                    <th >A</th>
                    <th >B</th>
                    <th >A</th>
                    <th >B</th>
                    <th >A</th>
                    <th >B</th>
                    <th >A</th>
                    <th >B</th>
                    <th >A</th>
                    <th >B</th>
                    <th >A</th>
                    <th >B</th>
                    <th >A</th>
                    <th >B</th>
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

                $triilia = 0;
                $triilib = 0;
                $triiliia = 0;
                $triiliib = 0;
                $triiliiia = 0;
                $triiliiib = 0;
                $triiliva = 0;
                $triilivb = 0;
                $triilva = 0;
                $triilvb = 0;

                foreach ($listeselon as $es) {
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

                    $triilia += $es->riil_ia;
                    $triilib += $es->riil_ib;
                    $triiliia += $es->riil_iia;
                    $triiliib += $es->riil_iib;
                    $triiliiia += $es->riil_iiia;
                    $triiliiib += $es->riil_iiib;
                    $triiliva += $es->riil_iva;
                    $triilivb += $es->riil_ivb;
                    $triilva += $es->riil_va;
                    $triilvb += $es->riil_vb;

                    $totalkursi = $es->ia + $es->ib + $es->iia + $es->iib + $es->iiia + $es->iiib + $es->iva + $es->ivb + $es->va + $es->vb;
                    $totalisi = $es->riil_ia + $es->riil_ib + $es->riil_iia + $es->riil_iib + $es->riil_iiia + $es->riil_iiib + $es->riil_iva + $es->riil_ivb + $es->riil_va + $es->riil_vb;
                    ?>
                    <tr>
                        <td  align='center'><?php echo $i++; ?></td>
                        <td ><?php echo $es->satker; ?></td>


                        <td align='right' ><?php echo $es->iia; ?></td>
                        <td align='right' ><?php echo $es->iib; ?></td>
                        <td align='right' ><?php echo $es->iiia; ?></td>
                        <td align='right'><?php echo $es->iiib; ?></td>
                        <td align='right' ><?php echo $es->iva; ?></td>
                        <td align='right' ><?php echo $es->ivb; ?></td>
                        <td align='right' ><?php echo $es->va; ?></td>
                        <td align='right' ><?php echo $es->vb; ?></td>
                        <td align='right'><?php echo $totalkursi; ?></td>


                        <td align='right' ><span class="<?php echo $es->riil_iia != $es->iia ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iia; ?></span></td>
                        <td align='right' ><span class="<?php echo $es->riil_iib != $es->iib ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iib; ?></span></td>
                        <td align='right' ><span class="<?php echo $es->riil_iiia != $es->iiia ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iiia; ?></span></td>
                        <td align='right'><span class="<?php echo $es->riil_iiib != $es->iiib ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iiib; ?></span></td>
                        <td align='right' ><span class="<?php echo $es->riil_iva != $es->iva ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_iva; ?></span></td>
                        <td align='right' ><span class="<?php echo $es->riil_ivb != $es->ivb ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_ivb; ?></span></td>
                        <td align='right' ><span class="<?php echo $es->riil_va != $es->va ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_va; ?></span></td>
                        <td align='right' ><span class="<?php echo $es->riil_vb != $es->vb ? 'hurufmerah' : '' ?>" ><?php echo $es->riil_vb; ?></span></td>
                        <td align='right'><span class="<?php echo $totalisi != $totalkursi ? 'hurufmerah' : '' ?>" ><?php echo $totalisi; ?></td>                    
                        <td align='right'>
                            <span class="<?php echo ($totalkursi - $totalisi) != 0 ? 'hurufmerah' : '' ?>" > 
                                <?php echo $totalkursi - $totalisi; ?> 
                            </span> 
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <?php $totalkursiall = $tvb + $tva + $tivb + $tiva + $tiiib + $tiiia + $tiib + $tiia + $tib + $tia; ?>
                    <?php $totalisiall = $triilvb + $triilva + $triilivb + $triiliva + $triiliiib + $triiliiia + $triiliib + $triiliia + $triilib + $triilia; ?>
                    <td  align='right' colspan='2'>Total</td>
                    
                    <td align='right'> <?php echo $tiia; ?></td>
                    <td align='right'> <?php echo $tiib; ?></td>
                    <td align='right'><?php echo $tiiia; ?></td>
                    <td align='right'> <?php echo $tiiib; ?></td>
                    <td align='right'>  <?php echo $tiva; ?></td>
                    <td align='right'> <?php echo $tivb; ?></td>
                    <td align='right'>  <?php echo $tva; ?></td>
                    <td align='right'> <?php echo $tvb; ?></td>
                    <td align='right'> <?php echo $totalkursiall; ?></td>
                  
                    <td align='right'> <?php echo $tiia; ?></td>
                    <td align='right'> <?php echo $tiib; ?></td>
                    <td align='right'><?php echo $tiiia; ?></td>
                    <td align='right'> <?php echo $tiiib; ?></td>
                    <td align='right'>  <?php echo $tiva; ?></td>
                    <td align='right'> <?php echo $tivb; ?></td>
                    <td align='right'>  <?php echo $tva; ?></td>
                    <td align='right'> <?php echo $tvb; ?></td>
                    <td align='right'> <?php echo $totalisiall ?></td>
                    <td align='right'> <?php echo $totalkursiall - $totalisiall; ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>