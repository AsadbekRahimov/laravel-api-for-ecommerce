<div class="table-responsive">
    <table class="table" id="shopPackagings-table">
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
        @foreach($shopPackagings as $shopPackaging)
            <tr>
                       <td>{{ $shopPackaging->sort }}</td>
            <td>{{ $shopPackaging->name }}</td>
            <td>{{ $shopPackaging->name_lang }}</td>
            <td>{{ $shopPackaging->title }}</td>
            <td>{{ $shopPackaging->title_lang }}</td>
            <td>{{ $shopPackaging->tranz }}</td>
            <td>{{ $shopPackaging->accept }}</td>
            <td>{{ $shopPackaging->active }}</td>
            <td>{{ $shopPackaging->deleted_by }}</td>
            <td>{{ $shopPackaging->deleted_text }}</td>
            <td>{{ $shopPackaging->modified_at }}</td>
            <td>{{ $shopPackaging->created_by }}</td>
            <td>{{ $shopPackaging->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopPackagings.destroy', $shopPackaging->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopPackagings.show', [$shopPackaging->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopPackagings.edit', [$shopPackaging->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
