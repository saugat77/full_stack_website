<?php
namespace App\Imports;

use App\Models\NamelistModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class NamelistImport implements ToCollection
{
    private $headers = [];

    /**
     * Handle the collection of rows.
     *
     * @param Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        // Read headers from the first row
        $this->headers = $rows->first()->map(function ($header) {
            return trim($header); // Trim any extra spaces around headers
        })->toArray();

        // Process remaining rows
        $rows->shift(); // Remove the header row

        foreach ($rows as $row) {
            $row = $row->map(function ($value) {
                return trim($value); // Trim extra spaces around values
            })->toArray();

            // Map data to model
            $namelist = [
                'fullname'     => $this->getValue('NAME', $row),
                'passport_no'  => $this->getValue('PP NO.', $row),
                'doe'          => $this->getValue('DATE OF EXPIRY', $row),
                'dob'          => $this->getValue('DATE OF BIRTH', $row),
                'ref'          => $this->getValue('REMARKS', $row),
                'status'       => $this->getValue('POST', $row),
            ];

            // Add the mapped data to the processedRows array
            $processedRows[] = $namelist;
               NamelistModel::updateOrCreate(
                ['passport_no' => $namelist['passport_no']],
                $namelist
            );
        }
    }

    /**
     * Get the value from the row based on header name.
     *
     * @param string $header
     * @param array $row
     * @return mixed|null
     */
    private function getValue(string $header, array $row)
    {
        $index = array_search($header, $this->headers);
        return $index !== false ? ($row[$index] ?? null) : null;
    }
}
