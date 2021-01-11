<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', 'Sort:') !!}
    {!! Form::number('sort', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Name Lang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_lang', 'Name Lang:') !!}
    {!! Form::text('name_lang', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Tranz Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tranz', 'Tranz:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('tranz', 0) !!}
        {!! Form::checkbox('tranz', '1', null) !!}
    </label>
</div>


<!-- Accept Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accept', 'Accept:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('accept', 0) !!}
        {!! Form::checkbox('accept', '1', null) !!}
    </label>
</div>


<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>


<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::text('number', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent', 'Parent:') !!}
    {!! Form::number('parent', null, ['class' => 'form-control']) !!}
</div>

<!-- Children Field -->
<div class="form-group col-sm-6">
    {!! Form::label('children', 'Children:') !!}
    {!! Form::number('children', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_name', 'Contact Name:') !!}
    {!! Form::text('contact_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Universal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_universal', 'Status Universal:') !!}
    {!! Form::text('status_universal', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Contact Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_phone', 'Contact Phone:') !!}
    {!! Form::text('contact_phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Add Contact Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('add_contact_phone', 'Add Contact Phone:') !!}
    {!! Form::text('add_contact_phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Comment User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comment_user', 'Comment User:') !!}
    {!! Form::text('comment_user', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Responsible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible', 'Responsible:') !!}
    {!! Form::number('responsible', null, ['class' => 'form-control']) !!}
</div>

<!-- Place Adress Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('place_adress_id', 'Place Adress Id:') !!}
    {!! Form::number('place_adress_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Place Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('place_region_id', 'Place Region Id:') !!}
    {!! Form::number('place_region_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Distance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('distance', 'Distance:') !!}
    {!! Form::number('distance', null, ['class' => 'form-control']) !!}
</div>

<!-- User Company Ids Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_company_ids', 'User Company Ids:') !!}
    {!! Form::text('user_company_ids', null, ['class' => 'form-control']) !!}
</div>

<!-- Operator Field -->
<div class="form-group col-sm-6">
    {!! Form::label('operator', 'Operator:') !!}
    {!! Form::number('operator', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Agent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comment_agent', 'Comment Agent:') !!}
    {!! Form::text('comment_agent', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Tasks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tasks', 'Tasks:') !!}
    {!! Form::text('tasks', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Source Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source', 'Source:') !!}
    {!! Form::number('source', null, ['class' => 'form-control']) !!}
</div>

<!-- Source Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_type', 'Source Type:') !!}
    {!! Form::text('source_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Called Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('called_time', 'Called Time:') !!}
    {!! Form::text('called_time', null, ['class' => 'form-control','id'=>'called_time']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#called_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Shop Reject Cause Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_reject_cause_id', 'Shop Reject Cause Id:') !!}
    {!! Form::number('shop_reject_cause_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpas Track Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpas_track', 'Cpas Track:') !!}
    {!! Form::text('cpas_track', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Client Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_client', 'Status Client:') !!}
    {!! Form::text('status_client', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Client History Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_client_history', 'Status Client History:') !!}
    {!! Form::text('status_client_history', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Callcenter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_callcenter', 'Status Callcenter:') !!}
    {!! Form::text('status_callcenter', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Callcenter History Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_callcenter_history', 'Status Callcenter History:') !!}
    {!! Form::text('status_callcenter_history', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Autodial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_autodial', 'Status Autodial:') !!}
    {!! Form::text('status_autodial', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Logistics Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_logistics', 'Status Logistics:') !!}
    {!! Form::text('status_logistics', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Logistics History Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_logistics_history', 'Status Logistics History:') !!}
    {!! Form::text('status_logistics_history', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Accept Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_accept', 'Status Accept:') !!}
    {!! Form::text('status_accept', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Accept History Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_accept_history', 'Status Accept History:') !!}
    {!! Form::text('status_accept_history', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Deliver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_deliver', 'Status Deliver:') !!}
    {!! Form::text('status_deliver', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Deliver History Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_deliver_history', 'Status Deliver History:') !!}
    {!! Form::text('status_deliver_history', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Deliver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_deliver', 'Date Deliver:') !!}
    {!! Form::text('date_deliver', null, ['class' => 'form-control','id'=>'date_deliver']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_deliver').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Time Deliver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_deliver', 'Time Deliver:') !!}
    {!! Form::text('time_deliver', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Date Approve Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_approve', 'Date Approve:') !!}
    {!! Form::text('date_approve', null, ['class' => 'form-control','id'=>'date_approve']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_approve').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Date Return Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_return', 'Date Return:') !!}
    {!! Form::text('date_return', null, ['class' => 'form-control','id'=>'date_return']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_return').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Delayed Deliver Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delayed_deliver_date', 'Delayed Deliver Date:') !!}
    {!! Form::text('delayed_deliver_date', null, ['class' => 'form-control','id'=>'delayed_deliver_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#delayed_deliver_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Shop Delay Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_delay_id', 'Shop Delay Id:') !!}
    {!! Form::number('shop_delay_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Delay Cause Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_delay_cause_id', 'Shop Delay Cause Id:') !!}
    {!! Form::number('shop_delay_cause_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Packaging Field -->
<div class="form-group col-sm-6">
    {!! Form::label('packaging', 'Packaging:') !!}
    {!! Form::number('packaging', null, ['class' => 'form-control']) !!}
</div>

<!-- Labelled Field -->
<div class="form-group col-sm-6">
    {!! Form::label('labelled', 'Labelled:') !!}
    {!! Form::text('labelled', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Fragile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fragile', 'Fragile:') !!}
    {!! Form::text('fragile', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Weight Plan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight_plan', 'Weight Plan:') !!}
    {!! Form::number('weight_plan', null, ['class' => 'form-control']) !!}
</div>

<!-- Volume Field -->
<div class="form-group col-sm-6">
    {!! Form::label('volume', 'Volume:') !!}
    {!! Form::number('volume', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Shipment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_shipment_id', 'Shop Shipment Id:') !!}
    {!! Form::number('shop_shipment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Prepayment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prepayment', 'Prepayment:') !!}
    {!! Form::number('prepayment', null, ['class' => 'form-control']) !!}
</div>

<!-- Deliver Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deliver_price', 'Deliver Price:') !!}
    {!! Form::number('deliver_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    {!! Form::number('total_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Coupon Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_coupon_id', 'Shop Coupon Id:') !!}
    {!! Form::number('shop_coupon_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Channel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_channel_id', 'Shop Channel Id:') !!}
    {!! Form::number('shop_channel_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_type', 'Payment Type:') !!}
    {!! Form::text('payment_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Additional Payment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('additional_payment_type', 'Additional Payment Type:') !!}
    {!! Form::text('additional_payment_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Additional Deliver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('additional_deliver', 'Additional Deliver:') !!}
    {!! Form::number('additional_deliver', null, ['class' => 'form-control']) !!}
</div>

<!-- Additional Received Money Field -->
<div class="form-group col-sm-6">
    {!! Form::label('additional_received_money', 'Additional Received Money:') !!}
    {!! Form::number('additional_received_money', null, ['class' => 'form-control']) !!}
</div>

<!-- Accepted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accepted', 'Accepted:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('accepted', 0) !!}
        {!! Form::checkbox('accepted', '1', null) !!}
    </label>
</div>


<!-- Shop Element Ids Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_element_ids', 'Shop Element Ids:') !!}
    {!! Form::text('shop_element_ids', null, ['class' => 'form-control']) !!}
</div>

<!-- Ware Ids Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ware_ids', 'Ware Ids:') !!}
    {!! Form::text('ware_ids', null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_by', 'Deleted By:') !!}
    {!! Form::number('deleted_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_text', 'Deleted Text:') !!}
    {!! Form::text('deleted_text', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Modified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modified_at', 'Modified At:') !!}
    {!! Form::text('modified_at', null, ['class' => 'form-control','id'=>'modified_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#modified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Modified By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modified_by', 'Modified By:') !!}
    {!! Form::number('modified_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('shopOrders.index') }}" class="btn btn-light">Cancel</a>
</div>
