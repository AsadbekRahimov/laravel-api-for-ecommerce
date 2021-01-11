<div class="table-responsive">
    <table class="table" id="shopDiscounts-table">
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
        <th>Min Price</th>
        <th>Type</th>
        <th>Kind</th>
        <th>Discount Percent</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopDiscounts as $shopDiscount)
            <tr>
                       <td>{{ $shopDiscount->sort }}</td>
            <td>{{ $shopDiscount->name }}</td>
            <td>{{ $shopDiscount->name_lang }}</td>
            <td>{{ $shopDiscount->title }}</td>
            <td>{{ $shopDiscount->title_lang }}</td>
            <td>{{ $shopDiscount->tranz }}</td>
            <td>{{ $shopDiscount->accept }}</td>
            <td>{{ $shopDiscount->active }}</td>
            <td>{{ $shopDiscount->min_price }}</td>
            <td>{{ $shopDiscount->type }}</td>
            <td>{{ $shopDiscount->kind }}</td>
            <td>{{ $shopDiscount->discount_percent }}</td>
            <td>{{ $shopDiscount->deleted_by }}</td>
            <td>{{ $shopDiscount->deleted_text }}</td>
            <td>{{ $shopDiscount->modified_at }}</td>
            <td>{{ $shopDiscount->created_by }}</td>
            <td>{{ $shopDiscount->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopDiscounts.destroy', $shopDiscount->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopDiscounts.show', [$shopDiscount->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopDiscounts.edit', [$shopDiscount->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
