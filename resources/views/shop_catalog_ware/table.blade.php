<div class="table-responsive">
    <table class="table" id="shopCatalogWare-table">
        <thead>
            <tr>
                <th>Sort</th>
        <th>Title</th>
        <th>Title Lang</th>
        <th>Tranz</th>
        <th>Accept</th>
        <th>Active</th>
        <th>Shop Catalog Id</th>
        <th>Ware Id</th>
        <th>Best Before</th>
        <th>Amount</th>
        <th>Amount History</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopCatalogWare as $shopCatalogWare)
            <tr>
                <td>{{ $shopCatalogWare->sort }}</td>
            <td>{{ $shopCatalogWare->title }}</td>
            <td>{{ $shopCatalogWare->title_lang }}</td>
            <td>{{ $shopCatalogWare->tranz }}</td>
            <td>{{ $shopCatalogWare->accept }}</td>
            <td>{{ $shopCatalogWare->active }}</td>
            <td>{{ $shopCatalogWare->shop_catalog_id }}</td>
            <td>{{ $shopCatalogWare->ware_id }}</td>
            <td>{{ $shopCatalogWare->best_before }}</td>
            <td>{{ $shopCatalogWare->amount }}</td>
            <td>{{ $shopCatalogWare->amount_history }}</td>
            <td>{{ $shopCatalogWare->deleted_by }}</td>
            <td>{{ $shopCatalogWare->deleted_text }}</td>
            <td>{{ $shopCatalogWare->modified_at }}</td>
            <td>{{ $shopCatalogWare->created_by }}</td>
            <td>{{ $shopCatalogWare->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopCatalogWare.destroy', $shopCatalogWare->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopCatalogWare.show', [$shopCatalogWare->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopCatalogWare.edit', [$shopCatalogWare->id]) }}" class='btn btn-default btn-xs'>
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
