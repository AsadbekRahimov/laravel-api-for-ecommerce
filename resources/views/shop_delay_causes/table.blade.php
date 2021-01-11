<div class="table-responsive">
    <table class="table" id="shopDelayCauses-table">
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
        @foreach($shopDelayCauses as $shopDelayCause)
            <tr>
                       <td>{{ $shopDelayCause->sort }}</td>
            <td>{{ $shopDelayCause->name }}</td>
            <td>{{ $shopDelayCause->name_lang }}</td>
            <td>{{ $shopDelayCause->title }}</td>
            <td>{{ $shopDelayCause->title_lang }}</td>
            <td>{{ $shopDelayCause->tranz }}</td>
            <td>{{ $shopDelayCause->accept }}</td>
            <td>{{ $shopDelayCause->active }}</td>
            <td>{{ $shopDelayCause->deleted_by }}</td>
            <td>{{ $shopDelayCause->deleted_text }}</td>
            <td>{{ $shopDelayCause->modified_at }}</td>
            <td>{{ $shopDelayCause->created_by }}</td>
            <td>{{ $shopDelayCause->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopDelayCauses.destroy', $shopDelayCause->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopDelayCauses.show', [$shopDelayCause->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopDelayCauses.edit', [$shopDelayCause->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
