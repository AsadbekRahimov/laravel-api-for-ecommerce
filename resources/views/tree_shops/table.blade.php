<div class="table-responsive">
    <table class="table" id="treeShops-table">
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
        <th>Root</th>
        <th>Lft</th>
        <th>Rgt</th>
        <th>Lvl</th>
        <th>Icon</th>
        <th>Icon Type</th>
        <th>Activeorig</th>
        <th>Selected</th>
        <th>Disabled</th>
        <th>Readonly</th>
        <th>Visible</th>
        <th>Collapsed</th>
        <th>Movable U</th>
        <th>Movable D</th>
        <th>Movable L</th>
        <th>Movable R</th>
        <th>Removable</th>
        <th>Removable All</th>
        <th>Child Allowed</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($treeShops as $treeShop)
            <tr>
                <td>{{ $treeShop->sort }}</td>
            <td>{{ $treeShop->name }}</td>
            <td>{{ $treeShop->name_lang }}</td>
            <td>{{ $treeShop->title }}</td>
            <td>{{ $treeShop->title_lang }}</td>
            <td>{{ $treeShop->tranz }}</td>
            <td>{{ $treeShop->accept }}</td>
            <td>{{ $treeShop->active }}</td>
            <td>{{ $treeShop->root }}</td>
            <td>{{ $treeShop->lft }}</td>
            <td>{{ $treeShop->rgt }}</td>
            <td>{{ $treeShop->lvl }}</td>
            <td>{{ $treeShop->icon }}</td>
            <td>{{ $treeShop->icon_type }}</td>
            <td>{{ $treeShop->activeOrig }}</td>
            <td>{{ $treeShop->selected }}</td>
            <td>{{ $treeShop->disabled }}</td>
            <td>{{ $treeShop->readonly }}</td>
            <td>{{ $treeShop->visible }}</td>
            <td>{{ $treeShop->collapsed }}</td>
            <td>{{ $treeShop->movable_u }}</td>
            <td>{{ $treeShop->movable_d }}</td>
            <td>{{ $treeShop->movable_l }}</td>
            <td>{{ $treeShop->movable_r }}</td>
            <td>{{ $treeShop->removable }}</td>
            <td>{{ $treeShop->removable_all }}</td>
            <td>{{ $treeShop->child_allowed }}</td>
            <td>{{ $treeShop->deleted_by }}</td>
            <td>{{ $treeShop->deleted_text }}</td>
            <td>{{ $treeShop->modified_at }}</td>
            <td>{{ $treeShop->created_by }}</td>
            <td>{{ $treeShop->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['treeShops.destroy', $treeShop->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('treeShops.show', [$treeShop->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('treeShops.edit', [$treeShop->id]) }}" class='btn btn-default btn-xs'>
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
