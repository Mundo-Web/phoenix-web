<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;
use SoDe\Extend\Text;

class PriceSeeder extends Seeder
{
    use Importable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::whereNotNull('id')->delete();
        Price::whereNotNull('id')->delete();
        Excel::import(
            new class implements ToModel
            {
                public function model(array $row)
                {
                    if (!is_numeric($row[0])) return null;
                    try {
                        Price::updateOrCreate(['distrito_id' => Text::fillStart($row[1], '0', 6)], [
                            'price' => $row[2],
                            'status' => true,
                            'visble' => true,
                            'local' => true
                        ]);
                    } catch (\Throwable $th) {
                        dump($th->getMessage());
                    }
                }
            },
            'storage/app/utils/Prices.xlsx'
        );
    }
}
