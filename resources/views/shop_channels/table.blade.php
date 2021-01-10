<div class="table-responsive">
    <table class="table" id="shopChannels-table">
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
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopChannels as $shopChannel)
            <tr>
                <td>{{ $shopChannel->sort }}</td>
            <td>{{ $shopChannel->name }}</td>
            <td>{{ $shopChannel->name_lang }}</td>
            <td>{{ $shopChannel->title }}</td>
            <td>{{ $shopChannel->title_lang }}</td>
            <td>{{ $shopChannel->tranz }}</td>
            <td>{{ $shopChannel->accept }}</td>
            <td>{{ $shopChannel->active }}</td>
            <td>{{ $shopChannel->deleted_by }}</td>
            <td>{{ $shopChannel->deleted_text }}</td>
            <td>{{ $shopChannel->modified_at }}</td>
            <td>{{ $shopChannel->created_by }}</td>
            <td>{{ $shopChannel->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopChannels.destroy', $shopChannel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopChannels.show', [$shopChannel->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopChannels.edit', [$shopChannel->id]) }}" class='btn btn-default btn-xs'>
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
