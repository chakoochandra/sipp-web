<div style="font-size:14px;width:90%;">

				<div class="cssTable" style='width:100%'>
					<?php
                           $row=$data_we_kppu->row();
                                echo'<table style="font-size:14px;width:100%;" border="0">';
                                echo'
                                <colgroup><col width="15%">
                                <col width="85%">
                                </colgroup>
                                ';
                                    echo'<tbody>';
                                    echo'<tr><tdstyle="text-align:left;" ></td>';
                                            echo'<td></td>';
                                            echo'</tr>';	
                                        echo'<tr><td id="first-child" style="text-align:left;" >Tanggal Surat KPPU</td>';
                                            echo'<td>'.$this->tanggalhelper->convertDayDate($row->tgl_surat_kppu).'</td>';
                                            echo'</tr>		
                                            <tr>
                                                <td id="first-child" style="text-align:left;">Nomor Surat KPPU</td>';
                                            echo'<td>'.$row->no_surat_kppu.'</td></tr>';      
                                        echo'</tr>
                                        <tr>
                                            <td id="first-child">Tanggal Penetapan MA</td>
                                            <td>'.$this->tanggalhelper->convertDayDate($row->tgl_surat_ma).'</td>
                                        </tr>
                                        <tr>
                                            <td id="first-child">Nomor Penetapan MA</td>
                                            <td>'.$row->no_surat_ma.'</td>
                                        </tr>    	
                                        <tr>
                                            <td id="first-child">Pengadilan Yang Berwenang</td>
                                            <td>'.$row->penunjukan_pn.'</td>
                                        </tr>
                                    </tbody>            
                                            
                                    </table>'; ?>
                           
</div>
<script type="text/javascript">
closeLoading();
</script>