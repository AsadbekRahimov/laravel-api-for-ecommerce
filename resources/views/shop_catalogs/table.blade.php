<div class="table-responsive">
    <table class="table" id="shopCatalogs-table">
        <thead>
            <tr>
                <th>Sort</th>
        <th>Name</th>
        <th>Name Lang</th>
        <th>Guid</th>
        <th>Title</th>
        <th>Title Lang</th>
        <th>Tranz</th>
        <th>Accept</th>
        <th>Active</th>
        <th>User Company Id</th>
        <th>Parent</th>
        <th>Shop Element Id</th>
        <th>Currency</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Available</th>
        <th>Price Old</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopCatalogs as $shopCatalog)
            <tr>
                <td>{{ $shopCatalog->sort }}</td>
            <td>{{ $shopCatalog->name }}</td>
            <td>{{ $shopCatalog->name_lang }}</td>
            <td>{{ $shopCatalog->guid }}</td>
            <td>{{ $shopCatalog->title }}</td>
            <td>{{ $shopCatalog->title_lang }}</td>
            <td>{{ $shopCatalog->tranz }}</td>
            <td>{{ $shopCatalog->accept }}</td>
            <td>{{ $shopCatalog->active }}</td>
            <td>{{ $shopCatalog->user_company_id }}</td>
            <td>{{ $shopCatalog->parent }}</td>
            <td>{{ $shopCatalog->shop_element_id }}</td>
            <td>{{ $shopCatalog->currency }}</td>
            <td>{{ $shopCatalog->price }}</td>
            <td>{{ $shopCatalog->amount }}</td>
            <td>{{ $shopCatalog->available }}</td>
            <td>{{ $shopCatalog->price_old }}</td>
            <td>{{ $shopCatalog->deleted_by }}</td>
            <td>{{ $shopCatalog->deleted_text }}</td>
            <td>{{ $shopCatalog->modified_at }}</td>
            <td>{{ $shopCatalog->created_by }}</td>
            <td>{{ $shopCatalog->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopCatalogs.destroy', $shopCatalog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopCatalogs.show', [$shopCatalog->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopCatalogs.edit', [$shopCatalog->id]) }}" class='btn btn-default btn-xs'>
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
