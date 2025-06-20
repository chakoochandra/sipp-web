<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] 			= "list_perkara";
$route['404_override'] 					= '';
$route['search/(:any)'] 				= "search_detail/index/$1";
$route['show_detil/(:any)'] 			= "redirect_page/redir_detil_perkara/$1";
$route['show_penetapan/(:any)'] 		= "redirect_page/redir_penetapan/$1";
$route['show_riwayat_perkara/(:any)'] 	= "redirect_page/redir_riwayat_perkara/$1";
$route['show_mediasi/(:any)'] 			= "redirect_page/redir_mediasi/$1";
$route['show_penuntutan/(:any)'] 		= "redirect_page/redir_penuntutan/$1";
$route['show_banding/(:any)'] 			= "redirect_page/redir_banding/$1";
$route['show_kasasi/(:any)'] 			= "redirect_page/redir_kasasi/$1";
$route['show_pk/(:any)'] 				= "redirect_page/redir_pk/$1";
$route['show_grasi/(:any)'] 			= "redirect_page/redir_grasi/$1";
$route['show_eksekusi/(:any)'] 			= "redirect_page/redir_eksekusi/$1";
$route['show_putusan/(:any)'] 			= "redirect_page/redir_putusan/$1";
$route['show_barang_bukti/(:any)'] 		= "redirect_page/redir_barang_bukti/$1";
$route['show_intervensi/(:any)'] 		= "redirect_page/redir_intervensi/$1";
$route['show_jadwal_sidang/(:any)'] 	= "redirect_page/redir_jadwal_sidang/$1";
$route['show_verzet/(:any)'] 			= "redirect_page/redir_verzet/$1";
$route['show_putusan_sela/(:any)'] 		= "redirect_page/redir_putusan_sela/$1";
$route['show_rekonvensi/(:any)'] 		= "redirect_page/redir_rekonvensi/$1";
$route['show_dismissal/(:any)'] 		= "redirect_page/redir_dismissal/$1";
$route['show_penetapan_gugur/(:any)'] 	= "redirect_page/redir_penetapan_gugur/$1";
$route['show_diversi/(:any)'] 			= "redirect_page/redir_diversi/$1";
$route['show_keberatan/(:any)'] 		= "redirect_page/redir_keberatan/$1";
$route['show_biaya_perkara/(:any)'] 	= "redirect_page/redir_biaya_perkara/$1";
$route['detil_jadwal_sidang/(:any)'] 	= "redirect_page/redir_detil_jadwal_sidang/$1";
$route['detil_delegasi/(:any)'] 		= "redirect_page/redir_detil_delegasi/$1";
$route['show_pen_persiapan/(:any)'] 	= "redirect_page/redir_pen_persiapan/$1";
$route['show_ikrar_talak/(:any)'] 		= "redirect_page/redir_ikrar/$1";
$route['show_mediasi_luar/(:any)'] 		= "redirect_page/redir_mediasi_luar/$1";
$route['penahanan/(:any)'] 				= "redirect_page/redir_detil_penahanan/$1";
$route['show_we_kppu/(:any)'] 	        = "redirect_page/redir_we_kppu/$1";
$route['show_saksi/(:any)'] 			= "redirect_page/redir_saksi/$1";

//equalizr 22 okt 2021
$route['show_pkpu_sementara/(:any)'] 	= "redirect_page/redir_pkpu_sementara/$1";
$route['show_pkpu_tetap/(:any)'] 		= "redirect_page/redir_pkpu_tetap/$1";
$route['show_rencana_perdamaian/(:any)']    = "redirect_page/redir_rencana_perdamaian/$1";
$route['show_laporan_pengurus/(:any)'] 		= "redirect_page/redir_laporan_pengurus/$1";
$route['show_setelah_putusan_pernyataan_pailit/(:any)'] 		= "redirect_page/redir_setelah_putusan_pernyataan_pailit/$1";
$route['show_pembatalan_perdamaian/(:any)'] 		= "redirect_page/redir_pembatalan_perdamaian/$1";

//equalizr 27 oktober 2021
$route['sub_pemeriksa/(:any)'] 	= "redirect_page/redir_sub_pemeriksa/$1";
$route['sub_pengawas/(:any)'] 	= "redirect_page/redir_sub_pengawas/$1";
$route['sub_kurator/(:any)'] 	= "redirect_page/redir_sub_kurator/$1";
$route['sub_publisitas/(:any)'] 	= "redirect_page/redir_sub_publisitas/$1";
$route['sub_rapat/(:any)'] 	= "redirect_page/redir_sub_rapat/$1";
$route['sub_cabutpernyataan/(:any)'] 	= "redirect_page/redir_sub_cabutpernyataan/$1";
$route['sub_cocokverifikasi/(:any)'] 	= "redirect_page/redir_sub_cocokverifikasi/$1";
$route['sub_gugatanlain/(:any)'] 	= "redirect_page/redir_sub_gugatanlain/$1";
$route['sub_perdamaian/(:any)'] 	= "redirect_page/redir_sub_perdamaian/$1";
$route['sub_bataldamai/(:any)'] 	= "redirect_page/redir_sub_bataldamai/$1";
$route['sub_insolven/(:any)'] 	= "redirect_page/redir_sub_insolven/$1";
$route['sub_pemberesan/(:any)'] 	= "redirect_page/redir_sub_pemberesan/$1";
$route['sub_biayapenyelesaian/(:any)'] 	= "redirect_page/redir_sub_biayapenyelesaian/$1";
$route['sub_pengakhiran/(:any)'] 	= "redirect_page/redir_sub_pengakhiran/$1";
$route['sub_pengumuman/(:any)'] 	= "redirect_page/redir_sub_pengumuman/$1";
$route['sub_laporankurator/(:any)'] 	= "redirect_page/redir_sub_laporankurator/$1";
$route['sub_rehabilitasi/(:any)'] 	= "redirect_page/redir_sub_rehabilitasi/$1";

//equalizr 3 februari 2022
$route['sub_harta_pailit/(.+)']       	= "sub_pemberesan/harta_pailit/$1";
$route['sub_pembagian_harta_pailit/(.+)']   = "sub_pemberesan/pembagian_harta_pailit/$1";
$route['sub_keberatan_harta_pailit/(.+)']   = "sub_pemberesan/keberatan_harta_pailit/$1";

