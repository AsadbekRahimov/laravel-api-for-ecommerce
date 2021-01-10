<div class="table-responsive">
    <table class="table" id="shopCategories-table">
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
        <th>Icon</th>
        <th>Shop Brand Ids</th>
        <th>Shop Review Option Ids</th>
        <th>Shop Option Type</th>
        <th>Shop Category Id</th>
        <th>Image</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopCategories as $shopCategory)
            <tr>
                <td>{{ $shopCategory->sort }}</td>
            <td>{{ $shopCategory->name }}</td>
            <td>{{ $shopCategory->name_lang }}</td>
            <td>{{ $shopCategory->title }}</td>
            <td>{{ $shopCategory->title_lang }}</td>
            <td>{{ $shopCategory->tranz }}</td>
            <td>{{ $shopCategory->accept }}</td>
            <td>{{ $shopCategory->active }}</td>
            <td>{{ $shopCategory->icon }}</td>
            <td>{{ $shopCategory->shop_brand_ids }}</td>
            <td>{{ $shopCategory->shop_review_option_ids }}</td>
            <td>{{ $shopCategory->shop_option_type }}</td>
            <td>{{ $shopCategory->shop_category_id }}</td>
            <td>{{ $shopCategory->image }}</td>
            <td>{{ $shopCategory->deleted_by }}</td>
            <td>{{ $shopCategory->deleted_text }}</td>
            <td>{{ $shopCategory->modified_at }}</td>
            <td>{{ $shopCategory->created_by }}</td>
            <td>{{ $shopCategory->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopCategories.destroy', $shopCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopCategories.show', [$shopCategory->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopCategories.edit', [$shopCategory->id]) }}" class='btn btn-default btn-xs'>
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
