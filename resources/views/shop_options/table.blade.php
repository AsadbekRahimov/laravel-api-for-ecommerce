<div class="table-responsive">
    <table class="table" id="shopOptions-table">
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
        <th>Shop Option Type Id</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopOptions as $shopOption)
            <tr>
                <td>{{ $shopOption->sort }}</td>
            <td>{{ $shopOption->name }}</td>
            <td>{{ $shopOption->name_lang }}</td>
            <td>{{ $shopOption->title }}</td>
            <td>{{ $shopOption->title_lang }}</td>
            <td>{{ $shopOption->tranz }}</td>
            <td>{{ $shopOption->accept }}</td>
            <td>{{ $shopOption->active }}</td>
            <td>{{ $shopOption->shop_option_type_id }}</td>
            <td>{{ $shopOption->deleted_by }}</td>
            <td>{{ $shopOption->deleted_text }}</td>
            <td>{{ $shopOption->modified_at }}</td>
            <td>{{ $shopOption->created_by }}</td>
            <td>{{ $shopOption->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopOptions.destroy', $shopOption->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopOptions.show', [$shopOption->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopOptions.edit', [$shopOption->id]) }}" class='btn btn-default btn-xs'>
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
