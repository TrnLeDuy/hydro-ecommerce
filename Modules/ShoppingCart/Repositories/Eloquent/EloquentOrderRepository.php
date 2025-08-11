<?php

namespace Modules\ShoppingCart\Repositories\Eloquent;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Modules\ShoppingCart\Repositories\OrderRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentOrderRepository extends EloquentBaseRepository implements OrderRepository
{
    public function serverPaginationFilteringFor(Request $request): LengthAwarePaginator
    {
        $orderData = $this->allWithBuilder();
        if ($request->get('search') !== null) {
            $search = $request->get('search');
            if (isset($search['keyword']) && $search['keyword'] != null) {
                $orderData->where('order_code', 'LIKE', "%{$search['keyword']}%");
            }
            if (isset($search['status']) && $search['status'] != null) {
                $orderData->where('status', $search['status']);
            }
        }

        if ($request->get('order_by') !== null && $request->get('order') !== 'null') {
            $order = $request->get('order') === 'ascending' ? 'asc' : 'desc';
            $orderData->orderBy($request->get('order_by'), $order);
        } else {
            $orderData->orderBy('id', 'desc');
        }

        return $orderData->paginate($request->get('per_page', 10));
    }
    
    public function paginateForCustomer(Request $request, $customerID): LengthAwarePaginator
    {
        $query = $this->model->where('customer_id', $customerID);
    
        if ($request->filled('order_code')) {
            $query->where('order_code', 'like', '%' . $request->order_code . '%');
        }
    
        if ($request->filled('payment_code')) {
            $query->where('payment_code', 'like', '%' . $request->payment_code . '%');
        }
    
        if ($request->has('status') && $request->status !== null && $request->status !== '') {
            $query->where('status', $request->status);
        }
    
        return $query->paginate(5);
    }     
}
