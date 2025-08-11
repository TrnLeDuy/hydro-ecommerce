<?php

namespace Modules\Contact\Repositories\Eloquent;

use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;


class EloquentContactRepository extends EloquentBaseRepository implements ContactRepository
{
    public function serverPaginationFilteringFor(Request $request): LengthAwarePaginator
    {
        $contacts = $this->allWithBuilder();

        if ($request->get('search') !== null) {
            $term = $request->get('search');
            $contacts->where('contactCode', 'LIKE', "%{$term}%")->orWhere('id', $term);
        }

        if ($request->get('order_by') !== null && $request->get('order') !== 'null') {
            $order = $request->get('order') === 'ascending' ? 'asc' : 'desc';
            $contacts->orderBy($request->get('order_by'), $order);
        } else {
            $contacts->orderBy('created_at', 'asc');
        }

        return $contacts->paginate($request->get('per_page', 10));
    }
}
