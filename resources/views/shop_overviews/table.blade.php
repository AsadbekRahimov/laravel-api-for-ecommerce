<div class="table-responsive">
    <table class="table" id="shopOverviews-table">
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
        <th>Type</th>
        <th>Shop Brand Id</th>
        <th>Shop Product Id</th>
        <th>User Company Id</th>
        <th>Url</th>
        <th>Text</th>
        <th>Virtues</th>
        <th>Drawbacks</th>
        <th>User Id</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopOverviews as $shopOverview)
            <tr>
                <td>{{ $shopOverview->sort }}</td>
            <td>{{ $shopOverview->name }}</td>
            <td>{{ $shopOverview->name_lang }}</td>
            <td>{{ $shopOverview->title }}</td>
            <td>{{ $shopOverview->title_lang }}</td>
            <td>{{ $shopOverview->tranz }}</td>
            <td>{{ $shopOverview->accept }}</td>
            <td>{{ $shopOverview->active }}</td>
            <td>{{ $shopOverview->type }}</td>
            <td>{{ $shopOverview->shop_brand_id }}</td>
            <td>{{ $shopOverview->shop_product_id }}</td>
            <td>{{ $shopOverview->user_company_id }}</td>
            <td>{{ $shopOverview->url }}</td>
            <td>{{ $shopOverview->text }}</td>
            <td>{{ $shopOverview->virtues }}</td>
            <td>{{ $shopOverview->drawbacks }}</td>
            <td>{{ $shopOverview->user_id }}</td>
            <td>{{ $shopOverview->deleted_by }}</td>
            <td>{{ $shopOverview->deleted_text }}</td>
            <td>{{ $shopOverview->modified_at }}</td>
            <td>{{ $shopOverview->created_by }}</td>
            <td>{{ $shopOverview->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopOverviews.destroy', $shopOverview->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopOverviews.show', [$shopOverview->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopOverviews.edit', [$shopOverview->id]) }}" class='btn btn-default btn-xs'>
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
