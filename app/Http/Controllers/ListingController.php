<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function showListings($data)
    {
        try {
            $query = Product::with(['brands', 'categories', 'images']);
            if (!empty($data)) {
                if (isset($data['price_min']) && isset($data['price_min'])) {
                    $query = $query->whereBetween('price', [$data['price_min'], $data['price_max']]);
                }

                if (isset($data['brands'])) {
                    $brandIds = $data['brands'];
                    $query = $query->whereHas('brands', function ($q) use ($brandIds) {
                        $q->whereIn('product_brands.id', $brandIds);
                    });
                }
                if (isset($data['categories'])) {
                    $categoryIds = $data['categories'];
                    $query = $query->whereHas('categories', function ($q) use ($categoryIds) {
                        $q->whereIn('product_categories.id', $categoryIds);
                    });
                }

                // Apply sorting
                switch ($data['sort_order']) {
                    case 'name_asc':
                        $query->orderBy('product_name', 'asc');
                        break;
                    case 'name_desc':
                        $query->orderBy('product_name', 'desc');
                        break;
                    case 'newest':
                        $query->orderBy('created_at', 'desc');
                        break;
                    case 'price_asc':
                        $query->orderBy('price', 'asc');
                        break;
                    case 'price_desc':
                        $query->orderBy('price', 'desc');
                        break;
                    default:
                        $query->orderBy('product_name', 'asc'); // Default sort
                        break;
                }
            }

            $products = $query->get()->toArray();

            return response($products, 201);
        } catch (Exception $e) {
            return response(["status" => "error", "message" => "Error occured while fetching listing" . $e], 500);
        }
    }
}
