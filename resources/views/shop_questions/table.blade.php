<div class="table-responsive">
    <table class="table" id="shopQuestions-table">
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
        <th>Type</th>
        <th>Target</th>
        <th>Shop Brand Id</th>
        <th>Shop Product Id</th>
        <th>User Company Id</th>
        <th>Text</th>
        <th>Parent Id</th>
        <th>Votes</th>
        <th>User Id</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopQuestions as $shopQuestion)
            <tr>
                       <td>{{ $shopQuestion->sort }}</td>
            <td>{{ $shopQuestion->name }}</td>
            <td>{{ $shopQuestion->name_lang }}</td>
            <td>{{ $shopQuestion->title }}</td>
            <td>{{ $shopQuestion->title_lang }}</td>
            <td>{{ $shopQuestion->tranz }}</td>
            <td>{{ $shopQuestion->accept }}</td>
            <td>{{ $shopQuestion->active }}</td>
            <td>{{ $shopQuestion->type }}</td>
            <td>{{ $shopQuestion->target }}</td>
            <td>{{ $shopQuestion->shop_brand_id }}</td>
            <td>{{ $shopQuestion->shop_product_id }}</td>
            <td>{{ $shopQuestion->user_company_id }}</td>
            <td>{{ $shopQuestion->text }}</td>
            <td>{{ $shopQuestion->parent_id }}</td>
            <td>{{ $shopQuestion->votes }}</td>
            <td>{{ $shopQuestion->user_id }}</td>
            <td>{{ $shopQuestion->deleted_by }}</td>
            <td>{{ $shopQuestion->deleted_text }}</td>
            <td>{{ $shopQuestion->modified_at }}</td>
            <td>{{ $shopQuestion->created_by }}</td>
            <td>{{ $shopQuestion->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopQuestions.destroy', $shopQuestion->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopQuestions.show', [$shopQuestion->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopQuestions.edit', [$shopQuestion->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
