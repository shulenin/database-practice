<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Support\Facades\DB;
use OpenApi\Annotations as OA;

class IndexController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/get-goods-with-price-and-quantity-on-stocks",
     *     summary="Get goods with price and quantity on stocks",
     *     tags={"Index"},
     *     @OA\Response(
     *          response=200,
     *          description="Успешная операция"
     *     )
     * )
     */
    public function getGoodsWithPriceAndQuantityOnStocks()
    {
        $data = Goods::query()
            ->leftJoin('prices', 'goods.id', '=', 'prices.goods_id')
            ->leftJoin('stock_balances', 'goods.id', '=', 'stock_balances.goods_id')
            ->leftJoin('stocks', 'stock_balances.stock_id', '=', 'stocks.id')
            ->select(['goods.id', 'goods.name', 'prices.value', 'stock_balances.quantity', 'stocks.name'])
            ->whereNotNull('stock_balances.goods_id');

        return [
            'count' => $data->count(),
            'data' => $data->get(),
        ];
    }

    /**
     * @OA\Get(
     *     path="/api/v1/get-goods-with-price-and-characteristic-without-stock",
     *     summary="Get goods with price and characteristic without stock",
     *     tags={"Index"},
     *     @OA\Response(
     *          response=200,
     *          description="Успешная операция"
     *     )
     * )
     */
    public function getGoodsWithPriceAndCharacteristicWithoutStock()
    {
        $data = Goods::query()
            ->leftJoin('prices', 'goods.id', '=', 'prices.goods_id')
            ->leftJoin('characteristics_values', 'goods.id', '=', 'characteristics_values.goods_id')
            ->leftJoin('char_kinds', 'characteristics_values.char_kind_id', '=', 'char_kinds.id')
            ->leftJoin('stock_balances', 'goods.id', '=', 'stock_balances.goods_id')
            ->select([
                'goods.id',
                'goods.name',
                'prices.value AS price',
                'characteristics_values.value AS characteristic'
            ])
            ->whereNull('stock_balances.goods_id');

        return [
            'count' => $data->count(),
            'data' => $data->get(),
        ];
    }

    /**
     * @OA\Get(
     *     path="/api/v1/get-goods-with-price-and-quantity-by-stock/{stockId}",
     *     summary="Get goods with price and quantity by stock",
     *     tags={"Index"},
     *     @OA\Parameter(
     *          name="stockId",
     *          description="Stock ID",
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Успешная операция"
     *     )
     * )
     */
    public function getGoodsWithPriceAndQuantityByStock(int $stockId)
    {
        $data = Goods::query()
            ->leftJoin('prices', 'goods.id', '=', 'prices.goods_id')
            ->leftJoin('stock_balances', 'goods.id', '=', 'stock_balances.goods_id')
            ->leftJoin('stocks', 'stock_balances.stock_id', '=', 'stocks.id')
            ->select([
                'goods.id',
                'goods.name',
                'prices.value AS price',
                'stock_balances.quantity AS stock_quantity',
            ])
            ->where('stocks.id', '=', $stockId);

        return [
            'count' => $data->count(),
            'data' => $data->get(),
        ];
    }

    /**
     * @OA\Get(
     *     path="/api/v1/get-goods-with-price-and-quantity-with-stock",
     *     summary="Get goods with price and quantity with stock",
     *     tags={"Index"},
     *     @OA\Response(
     *          response=200,
     *          description="Успешная операция"
     *     )
     * )
     */
    public function getGoodsWithPriceAndQuantityWithStock()
    {
        $data = Goods::query()
            ->leftJoin('prices', 'goods.id', '=', 'prices.goods_id')
            ->leftJoin('stock_balances', 'goods.id', '=', 'stock_balances.goods_id')
            ->leftJoin('stocks', 'stock_balances.stock_id', '=', 'stocks.id')
            ->select([
                'goods.id',
                'goods.name',
                DB::raw('SUM(prices.value) AS price'),
                DB::raw('SUM(stock_balances.quantity) AS stock_quantity'),
            ])
        ->groupBy(['goods.id', 'goods.name', 'stocks.id']);

        return [
            'count' => $data->count(),
            'data' => $data->get(),
        ];
    }
}