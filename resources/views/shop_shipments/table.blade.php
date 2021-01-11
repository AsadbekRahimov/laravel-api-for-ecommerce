<div class="table-responsive">
    <table class="table" id="shopShipments-table">
        <thead>
            <tr>
                <th>Sort</th>
        <th>Name</th>
        <th>Name Lang</th>
        <th>Code</th>
        <th>Title</th>
        <th>Title Lang</th>
        <th>Tranz</th>
        <th>Accept</th>
        <th>Active</th>
        <th>Date</th>
        <th>Date Deliver</th>
        <th>Date Deliver History</th>
        <th>Shipment Type</th>
        <th>Shop Courier Id</th>
        <th>Responsible</th>
        <th>Comment</th>
        <th>Ware Place Ids</th>
        <th>User Place Ids</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopShipments as $shopShipment)
            <tr>
                       <td>{{ $shopShipment->sort }}</td>
            <td>{{ $shopShipment->name }}</td>
            <td>{{ $shopShipment->name_lang }}</td>
            <td>{{ $shopShipment->code }}</td>
            <td>{{ $shopShipment->title }}</td>
            <td>{{ $shopShipment->title_lang }}</td>
            <td>{{ $shopShipment->tranz }}</td>
            <td>{{ $shopShipment->accept }}</td>
            <td>{{ $shopShipment->active }}</td>
            <td>{{ $shopShipment->date }}</td>
            <td>{{ $shopShipment->date_deliver }}</td>
            <td>{{ $shopShipment->date_deliver_history }}</td>
            <td>{{ $shopShipment->shipment_type }}</td>
            <td>{{ $shopShipment->shop_courier_id }}</td>
            <td>{{ $shopShipment->responsible }}</td>
            <td>{{ $shopShipment->comment }}</td>
            <td>{{ $shopShipment->ware_place_ids }}</td>
            <td>{{ $shopShipment->user_place_ids }}</td>
            <td>{{ $shopShipment->deleted_by }}</td>
            <td>{{ $shopShipment->deleted_text }}</td>
            <td>{{ $shopShipment->modified_at }}</td>
            <td>{{ $shopShipment->created_by }}</td>
            <td>{{ $shopShipment->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopShipments.destroy', $shopShipment->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopShipments.show', [$shopShipment->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopShipments.edit', [$shopShipment->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
