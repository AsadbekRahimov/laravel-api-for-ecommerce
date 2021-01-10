<div class="table-responsive">
    <table class="table" id="shopBrands-table">
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
        <th>Location</th>
        <th>Image</th>
        <th>Rating</th>
        <th>User Company Id</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopBrands as $shopBrand)
            <tr>
                <td>{{ $shopBrand->sort }}</td>
            <td>{{ $shopBrand->name }}</td>
            <td>{{ $shopBrand->name_lang }}</td>
            <td>{{ $shopBrand->title }}</td>
            <td>{{ $shopBrand->title_lang }}</td>
            <td>{{ $shopBrand->tranz }}</td>
            <td>{{ $shopBrand->accept }}</td>
            <td>{{ $shopBrand->active }}</td>
            <td>{{ $shopBrand->location }}</td>
            <td>{{ $shopBrand->image }}</td>
            <td>{{ $shopBrand->rating }}</td>
            <td>{{ $shopBrand->user_company_id }}</td>
            <td>{{ $shopBrand->deleted_by }}</td>
            <td>{{ $shopBrand->deleted_text }}</td>
            <td>{{ $shopBrand->modified_at }}</td>
            <td>{{ $shopBrand->created_by }}</td>
            <td>{{ $shopBrand->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopBrands.destroy', $shopBrand->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopBrands.show', [$shopBrand->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopBrands.edit', [$shopBrand->id]) }}" class='btn btn-default btn-xs'>
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
