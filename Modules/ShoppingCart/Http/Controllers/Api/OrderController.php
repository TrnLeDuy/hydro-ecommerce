<?php

namespace Modules\ShoppingCart\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ShoppingCart\Entities\Order;
use Modules\ShoppingCart\Enums\StatusOrderEnum;
use Modules\ShoppingCart\Http\Requests\UpdateOrderRequest;
use Modules\ShoppingCart\Repositories\OrderRepository;
use Modules\ShoppingCart\Transformers\FullOrderTransformer;
use Modules\ShoppingCart\Transformers\OrderTransformer;
use Modules\Wallet\Events\IncreaseBalanceWallet;
use Modules\Wallet\Repositories\CurrencyRepository;
use Modules\Wallet\Enums\TypeTransactionActionEnum;
use Modules\Wallet\Repositories\TransactionRepository;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    private $currencyRepository;
    private $transactionRepository;

    public function __construct(OrderRepository $orderRepository, CurrencyRepository $currencyRepository, TransactionRepository $transactionRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->currencyRepository = $currencyRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function indexServerSide(Request $request)
    {
        return OrderTransformer::collection($this->orderRepository->serverPaginationFilteringFor($request));
    }

    public function find(Request $request)
    {
        $orderId = $request->orderId;
        $Order = $this->orderRepository->find($orderId);
        return new FullOrderTransformer($Order);
    }

    public function update($OrderId, UpdateOrderRequest $request)
    {
        $Order = $this->orderRepository->find($OrderId);
        $this->orderRepository->update($Order, $request->all());
        if ($Order->status == 'CANCELED' && $Order->payment_method == 4) {
            $totalRefund = 0;
            $currency = $this->currencyRepository->findByAttributes(['code' => 'PLC', 'status' => true]);
            $transaction = $this->transactionRepository->findByAttributes(['order' => $OrderId]);
            $totalRefund = $transaction->amount;
            event(new IncreaseBalanceWallet($totalRefund, $Order->customer_id, $currency->id, TypeTransactionActionEnum::PRODUCT_CANCELED, $OrderId));
        }
        return response()->json([
            'errors' => false,
            'message' => trans('shoppingcart::messages.order updated'),
        ]);
    }

    public function destroy(Order $Order)
    {
        $this->orderRepository->destroy($Order);
        return response()->json([
            'errors' => false,
            'message' => trans('shoppingcart::messages.order deleted'),
        ]);
    }

    public function getStatusOrder()
    {
        return response()->json([
            'errors' => false,
            'statusOrders' => StatusOrderEnum::names(),
        ]);
    }
}
