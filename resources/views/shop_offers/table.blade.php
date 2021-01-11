<div class="table-responsive">
    <table class="table" id="shopOffers-table">
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
        <th>Shop Catalog Id</th>
        <th>Type</th>
        <th>Start</th>
        <th>End</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopOffers as $shopOffer)
            <tr>
                       <td>{{ $shopOffer->sort }}</td>
            <td>{{ $shopOffer->name }}</td>
            <td>{{ $shopOffer->name_lang }}</td>
            <td>{{ $shopOffer->title }}</td>
            <td>{{ $shopOffer->title_lang }}</td>
            <td>{{ $shopOffer->tranz }}</td>
            <td>{{ $shopOffer->accept }}</td>
            <td>{{ $shopOffer->active }}</td>
            <td>{{ $shopOffer->shop_catalog_id }}</td>
            <td>{{ $shopOffer->type }}</td>
            <td>{{ $shopOffer->start }}</td>
            <td>{{ $shopOffer->end }}</td>
            <td>{{ $shopOffer->deleted_by }}</td>
            <td>{{ $shopOffer->deleted_text }}</td>
            <td>{{ $shopOffer->modified_at }}</td>
            <td>{{ $shopOffer->created_by }}</td>
            <td>{{ $shopOffer->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopOffers.destroy', $shopOffer->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopOffers.show', [$shopOffer->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopOffers.edit', [$shopOffer->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
