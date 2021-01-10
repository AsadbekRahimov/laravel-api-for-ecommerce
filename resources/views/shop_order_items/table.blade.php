<div class="table-responsive">
    <table class="table" id="shopOrderItems-table">
        <thead>
            <tr>
                <th>Sort</th>
        <th>Name</th>
        <th>Name Lang</th>
        <th>Tranz</th>
        <th>Accept</th>
        <th>Active</th>
        <th>Shop Order Id</th>
        <th>Ware Id</th>
        <th>User Company Id</th>
        <th>Shop Catalog Id</th>
        <th>Best Before</th>
        <th>Ware Return Id</th>
        <th>Amount</th>
        <th>Amount History</th>
        <th>Amount Partial</th>
        <th>Amount Return</th>
        <th>Price</th>
        <th>Price All</th>
        <th>Price All Partial</th>
        <th>Price All Return</th>
        <th>Accepted</th>
        <th>Check Return</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopOrderItems as $shopOrderItem)
            <tr>
                <td>{{ $shopOrderItem->sort }}</td>
            <td>{{ $shopOrderItem->name }}</td>
            <td>{{ $shopOrderItem->name_lang }}</td>
            <td>{{ $shopOrderItem->tranz }}</td>
            <td>{{ $shopOrderItem->accept }}</td>
            <td>{{ $shopOrderItem->active }}</td>
            <td>{{ $shopOrderItem->shop_order_id }}</td>
            <td>{{ $shopOrderItem->ware_id }}</td>
            <td>{{ $shopOrderItem->user_company_id }}</td>
            <td>{{ $shopOrderItem->shop_catalog_id }}</td>
            <td>{{ $shopOrderItem->best_before }}</td>
            <td>{{ $shopOrderItem->ware_return_id }}</td>
            <td>{{ $shopOrderItem->amount }}</td>
            <td>{{ $shopOrderItem->amount_history }}</td>
            <td>{{ $shopOrderItem->amount_partial }}</td>
            <td>{{ $shopOrderItem->amount_return }}</td>
            <td>{{ $shopOrderItem->price }}</td>
            <td>{{ $shopOrderItem->price_all }}</td>
            <td>{{ $shopOrderItem->price_all_partial }}</td>
            <td>{{ $shopOrderItem->price_all_return }}</td>
            <td>{{ $shopOrderItem->accepted }}</td>
            <td>{{ $shopOrderItem->check_return }}</td>
            <td>{{ $shopOrderItem->deleted_by }}</td>
            <td>{{ $shopOrderItem->deleted_text }}</td>
            <td>{{ $shopOrderItem->modified_at }}</td>
            <td>{{ $shopOrderItem->created_by }}</td>
            <td>{{ $shopOrderItem->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopOrderItems.destroy', $shopOrderItem->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopOrderItems.show', [$shopOrderItem->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopOrderItems.edit', [$shopOrderItem->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
