<div class="table-responsive">
    <table class="table" id="menus-table">
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
        <th>Inline</th>
        <th>Target</th>
        <th>Icon</th>
        <th>Role</th>
        <th>Json</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->sort }}</td>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->name_lang }}</td>
            <td>{{ $menu->title }}</td>
            <td>{{ $menu->title_lang }}</td>
            <td>{{ $menu->tranz }}</td>
            <td>{{ $menu->accept }}</td>
            <td>{{ $menu->active }}</td>
            <td>{{ $menu->inline }}</td>
            <td>{{ $menu->target }}</td>
            <td>{{ $menu->icon }}</td>
            <td>{{ $menu->role }}</td>
            <td>{{ $menu->json }}</td>
            <td>{{ $menu->deleted_by }}</td>
            <td>{{ $menu->deleted_text }}</td>
            <td>{{ $menu->modified_at }}</td>
            <td>{{ $menu->created_by }}</td>
            <td>{{ $menu->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('menus.show', [$menu->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('menus.edit', [$menu->id]) }}" class='btn btn-default btn-xs'>
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
