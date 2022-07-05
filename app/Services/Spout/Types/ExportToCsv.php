<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Services\Spout\Types;

use OpenSpout\Common\Entity\Row;
use OpenSpout\Common\Exception\IOException;
use OpenSpout\Writer\CSV\Writer;
use OpenSpout\Writer\Exception\WriterNotOpenedException;
use App\Services\Spout\Exportable;
use App\Services\Spout\Contracts\ExportInterface;
use App\Services\Spout\Export;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportToCsv extends Export implements ExportInterface
{
    /**
     * @throws WriterNotOpenedException
     * @throws IOException
     */
    public function download(Exportable|array $exportOptions): BinaryFileResponse
    {
        $deleteFileAfterSend = boolval(data_get($exportOptions, 'deleteFileAfterSend', true));
        $this->build();

        return response()
            ->download(storage_path($this->fileName . '.csv'))
            ->deleteFileAfterSend($deleteFileAfterSend);
    }

    /**
     * @throws WriterNotOpenedException
     * @throws IOException
     */
    public function build(): void
    {
        $data = $this->prepare($this->data, $this->columns);

        $writer = new Writer();
        $writer->openToFile(storage_path($this->fileName . '.csv'));

        $row = Row::fromValues($data['headers']);

        $writer->addRow($row);

        /** @var array<string> $row */
        foreach ($data['rows'] as $row) {
            $row = Row::fromValues($row);
            $writer->addRow($row);
        }

        $writer->close();
    }
}