<div class="table-responsive">
    <table class="table" id="shopElements-table">
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
        <th>Shop Product Id</th>
        <th>Barcode</th>
        <th>Barcode Type</th>
        <th>Option Combine</th>
        <th>Option Simple</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopElements as $shopElement)
            <tr>
                       <td>{{ $shopElement->sort }}</td>
            <td>{{ $shopElement->name }}</td>
            <td>{{ $shopElement->name_lang }}</td>
            <td>{{ $shopElement->title }}</td>
            <td>{{ $shopElement->title_lang }}</td>
            <td>{{ $shopElement->tranz }}</td>
            <td>{{ $shopElement->accept }}</td>
            <td>{{ $shopElement->active }}</td>
            <td>{{ $shopElement->shop_product_id }}</td>
            <td>{{ $shopElement->barcode }}</td>
            <td>{{ $shopElement->barcode_type }}</td>
            <td>{{ $shopElement->option_combine }}</td>
            <td>{{ $shopElement->option_simple }}</td>
            <td>{{ $shopElement->deleted_by }}</td>
            <td>{{ $shopElement->deleted_text }}</td>
            <td>{{ $shopElement->modified_at }}</td>
            <td>{{ $shopElement->created_by }}</td>
            <td>{{ $shopElement->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopElements.destroy', $shopElement->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopElements.show', [$shopElement->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopElements.edit', [$shopElement->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
