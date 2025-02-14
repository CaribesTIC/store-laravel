<?php

namespace Modules\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Store\Actions\ExistenceAction;
use Modules\Store\Entities\DailyClosing;
use Modules\Article\Entities\Article; // Make sure this import is correct
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Get category distribution data for dashboard.
     */
    public function getCategoryDistribution(): JsonResponse
    {
        $categoryDistribution = DB::connection('pgsql')->table('categories') // <-- Changed to pgsql
            ->select('view_categories.family as category_name', DB::raw('SUM(view_stocks_by_accumulated_plus_unclosed_movements.stock_current * articles.price) as total_value'))
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('view_categories', 'categories.id', '=', 'view_categories.id')
            ->join('view_stocks_by_accumulated_plus_unclosed_movements', 'products.id', '=', 'view_stocks_by_accumulated_plus_unclosed_movements.article_id')
            ->join('articles', 'products.id', '=', 'articles.id') // <-- Changed to pgsql
            ->groupBy('view_categories.family')
            ->get();

        return response()->json($categoryDistribution);
    }

    /**
     * Get stock movements data for dashboard.
     */
    public function getStockMovements(): JsonResponse
    {
        $stockMovements = DB::connection('pgsql')->table('movements')
            ->select(DB::raw("DATE_TRUNC('month', date_time) AS month"), DB::raw('SUM(CASE WHEN type_id = 1 THEN 1 ELSE 0 END) as inputs'), DB::raw('SUM(CASE WHEN type_id = 2 THEN 1 ELSE 0 END) as outputs'))
            ->whereYear('date_time', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json($stockMovements);
    }

    /**
     * Get low stock items data for dashboard.
     */
    public function getLowStockItems(): JsonResponse
    {
        $lowStockItems = DB::connection('pgsql')->table('articles') // Changed to pgsql
            ->select('articles.id as article_id', 'articles.name', 'view_stocks_by_accumulated_plus_unclosed_movements.stock_current', 'articles.stock_min', 'movements.date_time as last_entry')
            ->join('view_stocks_by_accumulated_plus_unclosed_movements', 'articles.id', '=', 'view_stocks_by_accumulated_plus_unclosed_movements.id')
            ->leftJoin('movement_details', 'articles.id', '=', 'movement_details.article_id')
            ->leftJoin('movements', 'movement_details.movement_id', '=', 'movements.id')
            ->where('stock_current', '<=', DB::raw('articles.stock_min'))
            ->whereNull('articles.deleted_at')
            ->orderBy('articles.name')
            ->get();

        return response()->json($lowStockItems);
    }

    /**
     * Get warehouses data for dashboard.
     */
    public function getWarehouses(): JsonResponse
    {
        $warehouses = DB::table('sub_warehouses')
            ->select('uuid', 'name')
            ->get();

        return response()->json($warehouses);
    }
}
