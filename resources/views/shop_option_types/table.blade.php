<div class="table-responsive">
    <table class="table" id="shopOptionTypes-table">
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
        @foreach($shopOptionTypes as $shopOptionType)
            <tr>
                       <td>{{ $shopOptionType->sort }}</td>
            <td>{{ $shopOptionType->name }}</td>
            <td>{{ $shopOptionType->name_lang }}</td>
            <td>{{ $shopOptionType->title }}</td>
            <td>{{ $shopOptionType->title_lang }}</td>
            <td>{{ $shopOptionType->tranz }}</td>
            <td>{{ $shopOptionType->accept }}</td>
            <td>{{ $shopOptionType->active }}</td>
            <td>{{ $shopOptionType->shop_option_branch_id }}</td>
            <td>{{ $shopOptionType->show }}</td>
            <td>{{ $shopOptionType->deleted_by }}</td>
            <td>{{ $shopOptionType->deleted_text }}</td>
            <td>{{ $shopOptionType->modified_at }}</td>
            <td>{{ $shopOptionType->created_by }}</td>
            <td>{{ $shopOptionType->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopOptionTypes.destroy', $shopOptionType->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopOptionTypes.show', [$shopOptionType->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopOptionTypes.edit', [$shopOptionType->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
