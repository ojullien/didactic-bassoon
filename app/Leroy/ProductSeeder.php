<?php

declare(strict_types=1);

namespace App\Leroy;

use App\Leroy\Reader\ReaderInterface;
use Illuminate\Support\Facades\DB;

class ProductSeeder
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
    protected function readProducts(string $sDepartment_Id): array
    {
        $iPage = \random_int(1, 300);
        $this->pReader->setSource('https://api-gateway.leroymerlin.fr/api-product/v2/nomenclatures/internal/' . $sDepartment_Id . '/products?page=' . $iPage . '&size=50&fl=id');
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
     * @param string $sId
     * @throws \RuntimeException if an error occures
     * @return array
     */
    protected function readProduct(string $sId): array
    {
        $this->pReader->setSource('https://api-gateway.leroymerlin.fr/api-product/v2/products/' . $sId . '?webmetadata=1&fl=id,label,administrativeLabel');
        $sData = $this->pReader->read();
        $array = json_decode($sData, true);
        return $array;
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @throws \RuntimeException if an error occures
     * @return void
     */
    protected function writeProducts(array $data): void
    {
        \file_put_contents('listofproducts.json', \json_encode($data));
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @throws \RuntimeException if an error occures
     * @return void
     */
    protected function writeProduct(string $department_id, array $data): void
    {
        $sLabel = '';
        if (isset($data['label'])) {
            $sLabel = $data['label'];
        } elseif (isset($data['administrativeLabel'])) {
            $sLabel .= $data['administrativeLabel'];
        }

        DB::table('products')->insert([
            'id' => $data['id'],
            'department_id' => $department_id,
            'label' => $sLabel,
            'json' => \json_encode($data['_links'])
        ]);
    }

    /**
     * Undocumented function
     *
     * @param array $product
     * @return array
     */
    protected function filterLinks(array $product): array
    {
        $aNewLinks = [];
        $aLinks = $product['_links'];
        foreach ($aLinks as $aLink) {
            if ($aLink['rel'] == 'complementaries' || $aLink['rel'] == 'media' || $aLink['rel'] == 'characteristics') {
                $aNewLinks[] = $aLink['href'];
            }
        }
        $product['_links'] = $aNewLinks;
        return $product;
    }

    /**
     * Undocumented function
     *
     * @throws \RuntimeException if an error occures
     * @return void
     */
    public function process(): void
    {
        $products = $this->readProducts('4');
        //$this->writeProducts($products);
        DB::table('products')->truncate();
        foreach ($products as $product) {
            sleep(2);
            $data = $this->readProduct($product['id']);
            $data = $this->filterLinks($data);
            $this->writeProduct('4', $data);
        }
    }
}
