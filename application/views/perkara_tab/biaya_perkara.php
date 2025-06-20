<?php
    $sisa = 0;
    $debet = 0;
    $kredit = 0;
    $count = $data_biaya->num_rows();
    $repeat = false;
    $tahapan = 0;
    $stop = false;
    echo "<div class=\"cssTable\">";
    if($count>0){
        $i=0;
        foreach($data_biaya->result() as $row){
            if($tahapan == $row->IDTahapan){
                $stop = false;
            }else{

                if($tahapan!=0){
                    echo "<tr>";
                            echo "<th align=\"right\" bgcolor=\"#5FB85C\" colspan=\"3\" style=\"text-align: center;border-left: 1px solid white;\"><font color=\"#fff\">Total</td>";
                            echo "<th align=\"right\" bgcolor=\"#5FB85C\" style=\"text-align: right;\" ><font color=\"#fff\">Rp. ".number_format($debet, 0, ',', '.')."</td>";
                            echo "<th class=\"info\" bgcolor=\"#5FB85C\" style=\"text-align: right;\"><font color=\"#fff\">Rp. ".number_format($kredit, 0, ',', '.')."</td>";
                            echo "<th class=\"info\" bgcolor=\"#5FB85C\" style=\"text-align: right;\"><font color=\"#fff\">Rp. ".number_format($sisa, 0, ',', '.')."</td>";
                            echo "<th class=\"info\" bgcolor=\"#5FB85C\" style=\"text-align: right;\"></td>";
                        echo "</tr>";
                    echo "</table>";
                }
            }

            if($tahapan==0 OR $tahapan != $row->IDTahapan){
                $tahapan = $row->IDTahapan;
                $repeat = true;
                $sisa = 0;
                $debet = 0;
                $kredit = 0;
            }
            
            if($repeat){
                    if($tahapan!=10){
                        echo "<div style='padding-top:20px;'></div>";
                    }
                    if($tahapan==10){
                        $tahapannama = " TINGKAT PERTAMA";
                    }elseif($tahapan==20){
                        $tahapannama = " TINGKAT BANDING";
                    }elseif($tahapan==30){
                        $tahapannama = " TINGKAT KASASI";
                    }elseif($tahapan==40){
                        $tahapannama = " PENINJAUAN KEMBALI";
                    }elseif($tahapan==50){
                        $tahapannama = " EKSEKUSI";
                    }
                    ?>
                   
                        <div style='padding-left:5px;color: #648C03;font-size: 15px;'><b><?php echo "BIAYA".$tahapannama; ?></b></div>
                    <?php
                    echo "<table id=\"tableStatusPutusan\">";
                        echo "<tr>";
                            echo "<td width='5%' class=\"no\" rowspan=\"2\">No</td>";
                            echo "<td width='15%' class=\"dates\" rowspan=\"2\">Tanggal Transaksi</td>";
                            echo "<td width='35%' class=\"uraian\" rowspan=\"2\">Uraian</td>";
                            echo "<td width='45%' colspan=\"3\">nominal</td>";
                            echo "<td width='15%' class=\"ket\" rowspan=\"2\">Keterangan</td>";
                        echo "</tr>";
                        
                        echo "<tr>";
                            echo "<td width='15%' bgcolor=\"#5FB85C\" style=\"text-align: center;border-left: 1px solid white;\" class=\"info\"><font color=\"#fff\">Pemasukan</td>";
                            echo "<td width='15%' bgcolor=\"#5FB85C\" style=\"text-align: center;\" class=\"info\"><font color=\"#fff\">Pengeluaran</td>";
                            echo "<td width='15%' bgcolor=\"#5FB85C\" style=\"text-align: center;\" class=\"info\"><font color=\"#fff\">Sisa</td>";
                        echo "</tr>";
                $repeat = false;
                $stop = false;
            }
            if($row->jenisTransaksi ==1){
                $sisa = $sisa + $row->nominal;
                $debet = $debet + $row->nominal;
            }elseif($row->jenisTransaksi == -1){
                $sisa = $sisa - $row->nominal;
                $kredit = $kredit + $row->nominal;
            }
                echo "<tr>";
                        echo "<td class=\"no\">".($i+1)."</td>";
                        echo "<td class=\"dates\">".$this->tanggalhelper->convertDayDate($row->tglTransaksi)."</td>";
                        echo "<td>".$row->uraian."</td>";
                        if($row->jenisTransaksi ==1){
                            echo "<td style=\"text-align: right;\">Rp. ".number_format($row->nominal, 0, ',', '.')."</td>";
                            echo "<td></td>";
                            echo "<td style=\"text-align: right;\">Rp. ".number_format($sisa, 0, ',', '.')."</td>";
                        }elseif($row->jenisTransaksi == -1){
                            echo "<td></td>";
                            echo "<td style=\"text-align: right;\">Rp. ".number_format($row->nominal, 0, ',', '.')."</td>";
                            echo "<td style=\"text-align: right;\">Rp. ".number_format($sisa, 0, ',', '.')."</td>";
                        }
                        echo "<td>".$row->keterangan."</td>";
                echo "</tr>";
                            $i++;
            if(($i==$count OR $stop == true)){
                    echo "<tr>";
                            echo "<th align=\"right\" bgcolor=\"#5FB85C\" colspan=\"3\" style=\"text-align: center;\"><font color=\"#fff\">Total</td>";
                            echo "<th align=\"right\" bgcolor=\"#5FB85C\" style=\"text-align: right;\" ><font color=\"#fff\">Rp. ".number_format($debet, 0, ',', '.')."</td>";
                            echo "<th class=\"info\" bgcolor=\"#5FB85C\" style=\"text-align: right;\"><font color=\"#fff\">Rp. ".number_format($kredit, 0, ',', '.')."</td>";
                            echo "<th class=\"info\" bgcolor=\"#5FB85C\" style=\"text-align: right;\"><font color=\"#fff\">Rp. ".number_format($sisa, 0, ',', '.')."</td>";
                            echo "<th class=\"info\" bgcolor=\"#5FB85C\" style=\"text-align: right;\"></td>";
                        echo "</tr>";
                    echo "</table>";
                    
                $repeat = false;
            }
        }
    }
    echo "</div>";
?>
<script type="text/javascript">
closeLoading();
</script>





