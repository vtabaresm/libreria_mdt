<?php

namespace App\Imports;

use App\Models\Author;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AuthorsImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading, SkipsEmptyRows
{
    public int $creados = 0;
    public int $actualizados = 0;

    /**
     * Crea el autor o, si ya existe uno con el mismo nombre, lo actualiza.
     */
    public function model(array $row)
    {
        $author = Author::firstOrNew(['name' => trim($row['name'])]);

        $author->nationality = $row['nationality'] ?? null;
        $author->birth_date = $this->parseFecha($row['birth_date'] ?? null);

        $author->exists ? $this->actualizados++ : $this->creados++;
        $author->save();

        // Se guarda directamente (no se devuelve el modelo) para poder hacer upsert
        return null;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'nationality' => ['nullable', 'string', 'max:255'],
            'birth_date'  => ['nullable', function ($attribute, $value, $fail) {
                if ($value !== null && $value !== '' && $this->parseFecha($value) === null) {
                    $fail('La fecha no es válida (use el formato aaaa-mm-dd).');
                }
            }],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
        ];
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    /**
     * Excel puede entregar la fecha como número serial o como texto.
     */
    private function parseFecha($valor): ?string
    {
        if ($valor === null || $valor === '') {
            return null;
        }

        try {
            if (is_numeric($valor)) {
                return Date::excelToDateTimeObject($valor)->format('Y-m-d');
            }
            return Carbon::parse($valor)->format('Y-m-d');
        } catch (\Throwable $e) {
            return null;
        }
    }
}
