<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\CategoryRepository;
use Modules\Customer\Repositories\CustomerRepository;

class PublicController extends BasePublicController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;
    private $categoryRepository;
    private $customerRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        CustomerRepository $customerRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->customerRepository = $customerRepository;
    }

    public function getProductByCategory(Request $request, $slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);
        if ($category && $category->status == true) {
            $s = $request->s;
            $products = $this->productRepository->getProductByCategory($category->id, $s);
            return view('products.category', compact('category', 'products', 's'));
        } else {
            abort(404);
        }
    }

    public function detail($slug, Request $request)
    {
        $product = $this->productRepository->findBySlug($slug);
        if ($product && $product->status == true) {
            $category = $this->categoryRepository->findByAttributes(['id' => $product->category_id]);
            $product_seen = session('product_seen');
            $ref = $request->get('ref');
            if ($ref != null) {
                $customer = $this->customerRepository->findByAttributes(['ref_code' => $ref, 'status' => true]);
                session()->forget('product_detail_ref_code_aff');
                if ($customer) {
                    session()->push('product_detail_ref_code_aff', $ref);
                }
            }
            if (is_array($product_seen)) {
                if (!in_array($product->id, $product_seen)) {
                    session()->push('product_seen', $product->id);
                }
            } else {
                session()->forget('product_seen');
                session()->push('product_seen', $product->id);
            }
            $productRelated = $this->productRepository->getProductRelated($category->id, $product->id);
            return view('products.detail', compact('product', 'category', 'productRelated'));
        } else {
            abort(404);
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword != "" &&  $keyword != false) {
            $s = $request->s;
            $cid = $request->cid;
            $param = ['keyword' => $keyword];
            if ($cid != null && $cid != "") {
                $param['cid'] = $cid;
            }
            $url = route('fe.product.product.search',  $param);
            $products = $this->productRepository->getProductByKeyword($keyword,  $s, $cid, locale());
            return view('products.search', compact('products', 'keyword', 's', 'url'));
        } else {
            return back();
        }
    }
}
