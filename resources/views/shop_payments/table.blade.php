<div class="table-responsive">
    <table class="table" id="shopPayments-table">
        <thead>
            <tr>
                <th>Sort</th>
        <th>Name</th>
        <th>Name Lang</th>
        <th>Title</th>
        <th>Title Lang</th>
        <th>Tranz</th>
        <th>Accept</th>
        <th>Active</th>
        <th>Shop Order Id</th>
        <th>User Id</th>
        <th>Payment</th>
        <th>Code</th>
        <th>Processor</th>
        <th>Total</th>
        <th>Date</th>
        <th>Status</th>
        <th>Details</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopPayments as $shopPayment)
            <tr>
                <td>{{ $shopPayment->sort }}</td>
            <td>{{ $shopPayment->name }}</td>
            <td>{{ $shopPayment->name_lang }}</td>
            <td>{{ $shopPayment->title }}</td>
            <td>{{ $shopPayment->title_lang }}</td>
            <td>{{ $shopPayment->tranz }}</td>
            <td>{{ $shopPayment->accept }}</td>
            <td>{{ $shopPayment->active }}</td>
            <td>{{ $shopPayment->shop_order_id }}</td>
            <td>{{ $shopPayment->user_id }}</td>
            <td>{{ $shopPayment->payment }}</td>
            <td>{{ $shopPayment->code }}</td>
            <td>{{ $shopPayment->processor }}</td>
            <td>{{ $shopPayment->total }}</td>
            <td>{{ $shopPayment->date }}</td>
            <td>{{ $shopPayment->status }}</td>
            <td>{{ $shopPayment->details }}</td>
            <td>{{ $shopPayment->deleted_by }}</td>
            <td>{{ $shopPayment->deleted_text }}</td>
            <td>{{ $shopPayment->modified_at }}</td>
            <td>{{ $shopPayment->created_by }}</td>
            <td>{{ $shopPayment->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopPayments.destroy', $shopPayment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopPayments.show', [$shopPayment->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopPayments.edit', [$shopPayment->id]) }}" class='btn btn-default btn-xs'>
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
