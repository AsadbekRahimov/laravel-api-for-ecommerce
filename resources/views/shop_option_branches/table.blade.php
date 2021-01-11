<div class="table-responsive">
    <table class="table" id="shopOptionBranches-table">
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
        <th>Show</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopOptionBranches as $shopOptionBranch)
            <tr>
                       <td>{{ $shopOptionBranch->sort }}</td>
            <td>{{ $shopOptionBranch->name }}</td>
            <td>{{ $shopOptionBranch->name_lang }}</td>
            <td>{{ $shopOptionBranch->title }}</td>
            <td>{{ $shopOptionBranch->title_lang }}</td>
            <td>{{ $shopOptionBranch->tranz }}</td>
            <td>{{ $shopOptionBranch->accept }}</td>
            <td>{{ $shopOptionBranch->active }}</td>
            <td>{{ $shopOptionBranch->show }}</td>
            <td>{{ $shopOptionBranch->deleted_by }}</td>
            <td>{{ $shopOptionBranch->deleted_text }}</td>
            <td>{{ $shopOptionBranch->modified_at }}</td>
            <td>{{ $shopOptionBranch->created_by }}</td>
            <td>{{ $shopOptionBranch->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopOptionBranches.destroy', $shopOptionBranch->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopOptionBranches.show', [$shopOptionBranch->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopOptionBranches.edit', [$shopOptionBranch->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
