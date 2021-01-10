<div class="table-responsive">
    <table class="table" id="shopCouriers-table">
        <thead>
            <tr>
                <th>Sort</th>
        <th>Name</th>
        <th>Name Lang</th>
        <th>Code</th>
        <th>Guid</th>
        <th>Title</th>
        <th>Title Lang</th>
        <th>Tranz</th>
        <th>Accept</th>
        <th>Active</th>
        <th>Delivery Price</th>
        <th>Award Order</th>
        <th>Award Return</th>
        <th>Award Exchange</th>
        <th>Bonus</th>
        <th>Deposit</th>
        <th>Status</th>
        <th>Rating</th>
        <th>Place Region Ids</th>
        <th>Region Form</th>
        <th>User Company Id</th>
        <th>User Id</th>
        <th>Auto Id</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopCouriers as $shopCourier)
            <tr>
                <td>{{ $shopCourier->sort }}</td>
            <td>{{ $shopCourier->name }}</td>
            <td>{{ $shopCourier->name_lang }}</td>
            <td>{{ $shopCourier->code }}</td>
            <td>{{ $shopCourier->guid }}</td>
            <td>{{ $shopCourier->title }}</td>
            <td>{{ $shopCourier->title_lang }}</td>
            <td>{{ $shopCourier->tranz }}</td>
            <td>{{ $shopCourier->accept }}</td>
            <td>{{ $shopCourier->active }}</td>
            <td>{{ $shopCourier->delivery_price }}</td>
            <td>{{ $shopCourier->award_order }}</td>
            <td>{{ $shopCourier->award_return }}</td>
            <td>{{ $shopCourier->award_exchange }}</td>
            <td>{{ $shopCourier->bonus }}</td>
            <td>{{ $shopCourier->deposit }}</td>
            <td>{{ $shopCourier->status }}</td>
            <td>{{ $shopCourier->rating }}</td>
            <td>{{ $shopCourier->place_region_ids }}</td>
            <td>{{ $shopCourier->region_form }}</td>
            <td>{{ $shopCourier->user_company_id }}</td>
            <td>{{ $shopCourier->user_id }}</td>
            <td>{{ $shopCourier->auto_id }}</td>
            <td>{{ $shopCourier->deleted_by }}</td>
            <td>{{ $shopCourier->deleted_text }}</td>
            <td>{{ $shopCourier->modified_at }}</td>
            <td>{{ $shopCourier->created_by }}</td>
            <td>{{ $shopCourier->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopCouriers.destroy', $shopCourier->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopCouriers.show', [$shopCourier->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopCouriers.edit', [$shopCourier->id]) }}" class='btn btn-default btn-xs'>
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
