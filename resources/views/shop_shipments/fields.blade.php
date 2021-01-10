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

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Title Lang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title_lang', 'Title Lang:') !!}
    {!! Form::text('title_lang', null, ['class' => 'form-control']) !!}
</div>

<!-- Tranz Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('tranz', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('tranz', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('tranz', 'Tranz', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Accept Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('accept', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('accept', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('accept', 'Accept', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Active Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('active', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('active', 'Active', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Date Deliver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_deliver', 'Date Deliver:') !!}
    {!! Form::text('date_deliver', null, ['class' => 'form-control','id'=>'date_deliver']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_deliver').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Date Deliver History Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_deliver_history', 'Date Deliver History:') !!}
    {!! Form::text('date_deliver_history', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipment_type', 'Shipment Type:') !!}
    {!! Form::text('shipment_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Shop Courier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_courier_id', 'Shop Courier Id:') !!}
    {!! Form::number('shop_courier_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible', 'Responsible:') !!}
    {!! Form::number('responsible', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::text('comment', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Ware Place Ids Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ware_place_ids', 'Ware Place Ids:') !!}
    {!! Form::text('ware_place_ids', null, ['class' => 'form-control']) !!}
</div>

<!-- User Place Ids Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_place_ids', 'User Place Ids:') !!}
    {!! Form::text('user_place_ids', null, ['class' => 'form-control']) !!}
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

@push('page_scripts')
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