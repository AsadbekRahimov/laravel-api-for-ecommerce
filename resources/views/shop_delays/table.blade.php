<div class="table-responsive">
    <table class="table" id="shopDelays-table">
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
        <th>Date</th>
        <th>Comment</th>
        <th>Date Delay</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopDelays as $shopDelay)
            <tr>
                       <td>{{ $shopDelay->sort }}</td>
            <td>{{ $shopDelay->name }}</td>
            <td>{{ $shopDelay->name_lang }}</td>
            <td>{{ $shopDelay->title }}</td>
            <td>{{ $shopDelay->title_lang }}</td>
            <td>{{ $shopDelay->tranz }}</td>
            <td>{{ $shopDelay->accept }}</td>
            <td>{{ $shopDelay->active }}</td>
            <td>{{ $shopDelay->date }}</td>
            <td>{{ $shopDelay->comment }}</td>
            <td>{{ $shopDelay->date_delay }}</td>
            <td>{{ $shopDelay->deleted_by }}</td>
            <td>{{ $shopDelay->deleted_text }}</td>
            <td>{{ $shopDelay->modified_at }}</td>
            <td>{{ $shopDelay->created_by }}</td>
            <td>{{ $shopDelay->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopDelays.destroy', $shopDelay->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopDelays.show', [$shopDelay->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopDelays.edit', [$shopDelay->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
