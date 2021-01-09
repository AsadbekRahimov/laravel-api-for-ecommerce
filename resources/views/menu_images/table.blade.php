<div class="table-responsive">
    <table class="table" id="menuImages-table">
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
        <th>Image</th>
        <th>Target</th>
        <th>Location</th>
        <th>Url</th>
        <th>Role</th>
        <th>Menu Id</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($menuImages as $menuImage)
            <tr>
                <td>{{ $menuImage->sort }}</td>
            <td>{{ $menuImage->name }}</td>
            <td>{{ $menuImage->name_lang }}</td>
            <td>{{ $menuImage->title }}</td>
            <td>{{ $menuImage->title_lang }}</td>
            <td>{{ $menuImage->tranz }}</td>
            <td>{{ $menuImage->accept }}</td>
            <td>{{ $menuImage->active }}</td>
            <td>{{ $menuImage->image }}</td>
            <td>{{ $menuImage->target }}</td>
            <td>{{ $menuImage->location }}</td>
            <td>{{ $menuImage->url }}</td>
            <td>{{ $menuImage->role }}</td>
            <td>{{ $menuImage->menu_id }}</td>
            <td>{{ $menuImage->deleted_by }}</td>
            <td>{{ $menuImage->deleted_text }}</td>
            <td>{{ $menuImage->modified_at }}</td>
            <td>{{ $menuImage->created_by }}</td>
            <td>{{ $menuImage->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['menuImages.destroy', $menuImage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('menuImages.show', [$menuImage->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('menuImages.edit', [$menuImage->id]) }}" class='btn btn-default btn-xs'>
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
