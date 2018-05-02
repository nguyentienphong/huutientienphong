<? ob_start();
require_once("inc_security.php");
require_once("../../../classes/PHPExcel.php");
$arr_position = arr_categories(); 
$sqlSearch = getValue('rer_sql_search','str','POST');
$db_listing = new db_query('SELECT * 
                            FROM '.$bg_table.'
                            WHERE 1 '.$sqlSearch);
$objPHPExcel = new PHPExcel();
$sheet = $objPHPExcel->getActiveSheet();

$objPHPExcel->getProperties()->setCreator('admin')
                           ->setLastModifiedBy('admin')
                           ->setKeywords('excel php product')
                           ->setDescription('Export excel từ CSDL');
									
$objPHPExcel->setActiveSheetIndex()->setCellValue('A1', 'TT');
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('B1', 'Họ và tên');
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('C1', 'Vị trí');
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('D1', 'Bằng cấp');
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('E1', 'Chi tiết Bằng cấp');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(35);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('F1', 'Kinh nghiệm');
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('G1', 'Kỹ năng');
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('H1', 'Ngày sinh');
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(12);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I1', 'Giới tính');
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('J1', 'Địa chỉ');
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(50);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('K1', 'Số điện thoại');
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('L1', 'Email');
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('M1', 'Mức lương đề xuất');
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(17);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->setActiveSheetIndex()->setCellValue('N1', 'Người liên hệ');
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);	
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$i = 2;	

while($row = mysql_fetch_assoc($db_listing->result)){    
   $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $i, $i);
   $objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $i, $row['rer_name']);
   $objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $i, $arr_position[$row['rer_position']]);
   $objPHPExcel->getActiveSheet()->getStyle('C' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $i, $arr_diploma[$row['rer_diploma']]);
   $objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $i, $row['rer_diploma_detail']);
   $objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $i, $row['rer_message']);
   $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $i, $row['rer_other']);
   $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $i, date("d/m/Y",$row['rer_date']));
   $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $i, $arr_sex[$row['rer_sex']]);
   $objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $i, $row['rer_address']);
   $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('K' . $i, $row['rer_phone']);
   $objPHPExcel->getActiveSheet()->getStyle('K' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $i, $row['rer_email']);
   $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $i, $row['rer_salary']);
   $objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $i, '');
   $objPHPExcel->getActiveSheet()->getStyle('N' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   $i++;
   }
$sheet->getStyle('A1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('B1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('C1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('D1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('E1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('F1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('G1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('H1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('I1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('J1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('K1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('L1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('M1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
$sheet->getStyle('N1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'AEAAAA')
        )
    )
);
unset($db_listing);
 
$objPHPExcel->getActiveSheet()->setTitle("Email");
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$export_filename = "Danhsachtuyendung" . date("Ymd") . "_" . time() . ".xls";
// Redirect output to a client’s web browser (Excel5)
ob_end_clean();
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$export_filename.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$objWriter->save('php://output'); 
ob_end_flush();
exit;
                                 
?>