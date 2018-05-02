<? ob_start();
require_once("inc_security.php");
require_once("../../../admin/resources/Spout/Autoloader/autoload.php");
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\Style\Color;

$existingFilePath = $_SERVER['DOCUMENT_ROOT'].'/file/baocaochitietvandon.xlsx';
$newFilePath = 'new-baocaochitietvandon.xlsx';

// we need a reader to read the existing file...
$reader = ReaderFactory::create(Type::XLSX);
$reader->open($existingFilePath);
$reader->setShouldFormatDates(true); // this is to be able to copy dates

// ... and a writer to create the new file
$writer = WriterFactory::create(Type::XLSX);
$writer->openToFile($newFilePath);

// let's read the entire spreadsheet
foreach ($reader->getSheetIterator() as $sheetIndex => $sheet) {
    // Add sheets in the new file, as you read new sheets in the existing one
    if ($sheetIndex !== 1) {
        $writer->addNewSheetAndMakeItCurrent();
    }

    foreach ($sheet->getRowIterator() as $rowIndex => $row) {
        $songTitle = $row[0];
        $artist = $row[1];

        // Change the album name for "Yellow Submarine"
        if ($songTitle === 'Yellow Submarine') {
            $row[2] = 'The White Album';
        }

        // skip Bob Marley's songs
        if ($artist === 'Bob Marley') {
            continue;
        }

        // write the edited row to the new file
        $writer->addRow($row);

        // insert new song at the right position, between the 3rd and 4th rows
        if ($rowIndex >=4) {
            
        }
    }
}
$style = (new StyleBuilder())
           ->setFontBold()
           ->setFontSize(15)
           ->setFontColor(Color::BLUE)
           ->setShouldWrapText()
           ->setBackgroundColor(Color::YELLOW)
           ->build();
$array = array('tiennh', 'ss', 'Hotel California', number_format(1976));
            $writer->addRow($array);
$array = array('tiennh1', 'ss1', 'Hotel California', 1976);
            $writer->addRowWithStyle($array,$style);
$writer->openToBrowser($newFilePath);
$reader->close();
$writer->close();