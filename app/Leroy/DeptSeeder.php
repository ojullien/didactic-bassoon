<?php

declare(strict_types=1);

namespace App\Leroy;

use App\Leroy\Reader\ReaderInterface;
use Illuminate\Support\Facades\DB;

class DeptSeeder
{
    public function __construct(
        public ReaderInterface $pReader
    ) {
    }

    /**
     * Undocumented function
     *
     * @throws \RuntimeException if an error occures
     * @return array
     */
    protected function read(): array
    {
        $this->pReader->setSource('https://api-gateway.leroymerlin.fr/api-product/v2/nomenclatures/internal?fl=id,label,productsCount');
        $sData = $this->pReader->read();
        $array = json_decode($sData, true);
        if (!isset($array['data']) || !is_array($array['data'])) {
            throw new \RuntimeException('Data is missing', 500);
        }
        return $array['data'];
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @throws \RuntimeException if an error occures
     * @return void
     */
    protected function write(array $data): void
    {
        DB::table('departments')->truncate();
        foreach ($data as $department) {

            DB::table('departments')->insert([
                'id' => $department['id'],
                'label' => $department['label'],
                'count' => $department['productsCount']
            ]);
        }
    }

    /**
     * Undocumented function
     *
     * @throws \RuntimeException if an error occures
     * @return void
     */
    public function process(): void
    {
        $data = $this->read();
        $this->write($data);
    }
}
