<div class="table-responsive">
    <table class="table" id="shopReviewOptions-table">
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
        <th>Shop Option Branch Id</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopReviewOptions as $shopReviewOption)
            <tr>
                       <td>{{ $shopReviewOption->sort }}</td>
            <td>{{ $shopReviewOption->name }}</td>
            <td>{{ $shopReviewOption->name_lang }}</td>
            <td>{{ $shopReviewOption->title }}</td>
            <td>{{ $shopReviewOption->title_lang }}</td>
            <td>{{ $shopReviewOption->tranz }}</td>
            <td>{{ $shopReviewOption->accept }}</td>
            <td>{{ $shopReviewOption->active }}</td>
            <td>{{ $shopReviewOption->shop_option_branch_id }}</td>
            <td>{{ $shopReviewOption->deleted_by }}</td>
            <td>{{ $shopReviewOption->deleted_text }}</td>
            <td>{{ $shopReviewOption->modified_at }}</td>
            <td>{{ $shopReviewOption->created_by }}</td>
            <td>{{ $shopReviewOption->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopReviewOptions.destroy', $shopReviewOption->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopReviewOptions.show', [$shopReviewOption->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopReviewOptions.edit', [$shopReviewOption->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
