<div class="table-responsive">
    <table class="table" id="shopOrders-table">
        <thead>
            <tr>
                <th>Sort</th>
        <th>Name</th>
        <th>Name Lang</th>
        <th>Code</th>
        <th>Tranz</th>
        <th>Accept</th>
        <th>Active</th>
        <th>Number</th>
        <th>User Id</th>
        <th>Parent</th>
        <th>Children</th>
        <th>Contact Name</th>
        <th>Status Universal</th>
        <th>Contact Phone</th>
        <th>Add Contact Phone</th>
        <th>Date</th>
        <th>Comment User</th>
        <th>Responsible</th>
        <th>Place Adress Id</th>
        <th>Place Region Id</th>
        <th>Distance</th>
        <th>User Company Ids</th>
        <th>Operator</th>
        <th>Comment Agent</th>
        <th>Tasks</th>
        <th>Source</th>
        <th>Source Type</th>
        <th>Called Time</th>
        <th>Shop Reject Cause Id</th>
        <th>Cpas Track</th>
        <th>Status Client</th>
        <th>Status Client History</th>
        <th>Status Callcenter</th>
        <th>Status Callcenter History</th>
        <th>Status Autodial</th>
        <th>Status Logistics</th>
        <th>Status Logistics History</th>
        <th>Status Accept</th>
        <th>Status Accept History</th>
        <th>Status Deliver</th>
        <th>Status Deliver History</th>
        <th>Date Deliver</th>
        <th>Time Deliver</th>
        <th>Date Approve</th>
        <th>Date Return</th>
        <th>Delayed Deliver Date</th>
        <th>Shop Delay Id</th>
        <th>Shop Delay Cause Id</th>
        <th>Packaging</th>
        <th>Labelled</th>
        <th>Fragile</th>
        <th>Weight</th>
        <th>Weight Plan</th>
        <th>Volume</th>
        <th>Shop Shipment Id</th>
        <th>Price</th>
        <th>Prepayment</th>
        <th>Deliver Price</th>
        <th>Total Price</th>
        <th>Shop Coupon Id</th>
        <th>Shop Channel Id</th>
        <th>Payment Type</th>
        <th>Additional Payment Type</th>
        <th>Additional Deliver</th>
        <th>Additional Received Money</th>
        <th>Accepted</th>
        <th>Shop Element Ids</th>
        <th>Ware Ids</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopOrders as $shopOrder)
            <tr>
                       <td>{{ $shopOrder->sort }}</td>
            <td>{{ $shopOrder->name }}</td>
            <td>{{ $shopOrder->name_lang }}</td>
            <td>{{ $shopOrder->code }}</td>
            <td>{{ $shopOrder->tranz }}</td>
            <td>{{ $shopOrder->accept }}</td>
            <td>{{ $shopOrder->active }}</td>
            <td>{{ $shopOrder->number }}</td>
            <td>{{ $shopOrder->user_id }}</td>
            <td>{{ $shopOrder->parent }}</td>
            <td>{{ $shopOrder->children }}</td>
            <td>{{ $shopOrder->contact_name }}</td>
            <td>{{ $shopOrder->status_universal }}</td>
            <td>{{ $shopOrder->contact_phone }}</td>
            <td>{{ $shopOrder->add_contact_phone }}</td>
            <td>{{ $shopOrder->date }}</td>
            <td>{{ $shopOrder->comment_user }}</td>
            <td>{{ $shopOrder->responsible }}</td>
            <td>{{ $shopOrder->place_adress_id }}</td>
            <td>{{ $shopOrder->place_region_id }}</td>
            <td>{{ $shopOrder->distance }}</td>
            <td>{{ $shopOrder->user_company_ids }}</td>
            <td>{{ $shopOrder->operator }}</td>
            <td>{{ $shopOrder->comment_agent }}</td>
            <td>{{ $shopOrder->tasks }}</td>
            <td>{{ $shopOrder->source }}</td>
            <td>{{ $shopOrder->source_type }}</td>
            <td>{{ $shopOrder->called_time }}</td>
            <td>{{ $shopOrder->shop_reject_cause_id }}</td>
            <td>{{ $shopOrder->cpas_track }}</td>
            <td>{{ $shopOrder->status_client }}</td>
            <td>{{ $shopOrder->status_client_history }}</td>
            <td>{{ $shopOrder->status_callcenter }}</td>
            <td>{{ $shopOrder->status_callcenter_history }}</td>
            <td>{{ $shopOrder->status_autodial }}</td>
            <td>{{ $shopOrder->status_logistics }}</td>
            <td>{{ $shopOrder->status_logistics_history }}</td>
            <td>{{ $shopOrder->status_accept }}</td>
            <td>{{ $shopOrder->status_accept_history }}</td>
            <td>{{ $shopOrder->status_deliver }}</td>
            <td>{{ $shopOrder->status_deliver_history }}</td>
            <td>{{ $shopOrder->date_deliver }}</td>
            <td>{{ $shopOrder->time_deliver }}</td>
            <td>{{ $shopOrder->date_approve }}</td>
            <td>{{ $shopOrder->date_return }}</td>
            <td>{{ $shopOrder->delayed_deliver_date }}</td>
            <td>{{ $shopOrder->shop_delay_id }}</td>
            <td>{{ $shopOrder->shop_delay_cause_id }}</td>
            <td>{{ $shopOrder->packaging }}</td>
            <td>{{ $shopOrder->labelled }}</td>
            <td>{{ $shopOrder->fragile }}</td>
            <td>{{ $shopOrder->weight }}</td>
            <td>{{ $shopOrder->weight_plan }}</td>
            <td>{{ $shopOrder->volume }}</td>
            <td>{{ $shopOrder->shop_shipment_id }}</td>
            <td>{{ $shopOrder->price }}</td>
            <td>{{ $shopOrder->prepayment }}</td>
            <td>{{ $shopOrder->deliver_price }}</td>
            <td>{{ $shopOrder->total_price }}</td>
            <td>{{ $shopOrder->shop_coupon_id }}</td>
            <td>{{ $shopOrder->shop_channel_id }}</td>
            <td>{{ $shopOrder->payment_type }}</td>
            <td>{{ $shopOrder->additional_payment_type }}</td>
            <td>{{ $shopOrder->additional_deliver }}</td>
            <td>{{ $shopOrder->additional_received_money }}</td>
            <td>{{ $shopOrder->accepted }}</td>
            <td>{{ $shopOrder->shop_element_ids }}</td>
            <td>{{ $shopOrder->ware_ids }}</td>
            <td>{{ $shopOrder->deleted_by }}</td>
            <td>{{ $shopOrder->deleted_text }}</td>
            <td>{{ $shopOrder->modified_at }}</td>
            <td>{{ $shopOrder->created_by }}</td>
            <td>{{ $shopOrder->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopOrders.destroy', $shopOrder->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopOrders.show', [$shopOrder->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopOrders.edit', [$shopOrder->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
