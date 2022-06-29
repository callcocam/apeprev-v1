<?php

namespace App\Services\Spout\Types;

use OpenSpout\Common\Entity\Row;
use OpenSpout\Common\Entity\Style\{Color, Style};
use OpenSpout\Common\Exception\IOException;
use OpenSpout\Writer\Exception\WriterNotOpenedException;
use OpenSpout\Writer\XLSX\{Options, Writer};
use App\Services\Spout\Exportable;
use App\Services\Spout\Contracts\ExportInterface;
use App\Services\Spout\{Export};
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportToXLS extends Export implements ExportInterface
{
    /**
     * @throws \Exception
     */
    public function download(Exportable|array $exportOptions): BinaryFileResponse
    {
        $deleteFileAfterSend = boolval(data_get($exportOptions, 'deleteFileAfterSend', true));
        $this->striped       = strval(data_get($exportOptions, 'striped', true));

        /** @var array $columnWidth */
        $columnWidth         = data_get($exportOptions, 'columnWidth', []);
        $this->columnWidth   = $columnWidth;

        $this->build();

        return response()
            ->download(storage_path($this->fileName . '.xlsx'))
            ->deleteFileAfterSend($deleteFileAfterSend);
    }

    /**
     * @throws WriterNotOpenedException
     * @throws IOException
     */
    public function build(): void
    {
        $data = $this->prepare($this->data, $this->columns);
     
        $options = new Options();
        $writer  = new Writer($options);

        $writer->openToFile(storage_path($this->fileName . '.xlsx'));

        $style = (new Style())
            ->setFontBold()
            ->setFontName('Arial')
            ->setFontSize(12)
            ->setFontColor(Color::BLACK)
            ->setShouldWrapText(false)
            ->setBackgroundColor('d0d3d8');

        $row = Row::fromValues(data_get($data, 'headers'), $style);

        $writer->addRow($row);

        /**
         * @var int<1, max> $column
         * @var float $width
         */
        foreach ($this->columns as $column) {
            if($width = data_get($column, 'atributes.width')){
                $options->setColumnWidth($width, $column);
            }
        }

        $default = (new Style())
            ->setFontName('Arial')
            ->setFontSize(12);

        $gray = (new Style())
            ->setFontName('Arial')
            ->setFontSize(12)
            ->setBackgroundColor($this->striped);

        /** @var array<string> $row */
        foreach (data_get($data,'rows') as $key => $row) {
            if (count($row)) {
                if ( $row=array_filter($row)) {
                    if ($key % 2 && $this->striped) {
                        $row = Row::fromValues($row, $gray);
                    } else {
                        $row = Row::fromValues($row, $default);
                    }
                    $writer->addRow($row);
                }
            }
        }

        $writer->close();
    }
}