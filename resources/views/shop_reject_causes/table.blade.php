<div class="table-responsive">
    <table class="table" id="shopRejectCauses-table">
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
        @foreach($shopRejectCauses as $shopRejectCause)
            <tr>
                       <td>{{ $shopRejectCause->sort }}</td>
            <td>{{ $shopRejectCause->name }}</td>
            <td>{{ $shopRejectCause->name_lang }}</td>
            <td>{{ $shopRejectCause->title }}</td>
            <td>{{ $shopRejectCause->title_lang }}</td>
            <td>{{ $shopRejectCause->tranz }}</td>
            <td>{{ $shopRejectCause->accept }}</td>
            <td>{{ $shopRejectCause->active }}</td>
            <td>{{ $shopRejectCause->deleted_by }}</td>
            <td>{{ $shopRejectCause->deleted_text }}</td>
            <td>{{ $shopRejectCause->modified_at }}</td>
            <td>{{ $shopRejectCause->created_by }}</td>
            <td>{{ $shopRejectCause->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopRejectCauses.destroy', $shopRejectCause->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopRejectCauses.show', [$shopRejectCause->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopRejectCauses.edit', [$shopRejectCause->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
