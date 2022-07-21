<?php

namespace App\Services\Spout\Contracts;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface ExportInterface
{
    public function download(array $exportOptions): BinaryFileResponse;

    public function build(): void;
}