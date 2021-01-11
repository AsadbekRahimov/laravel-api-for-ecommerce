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


<!-- Shop Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_order_id', 'Shop Order Id:') !!}
    {!! Form::number('shop_order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ware Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ware_id', 'Ware Id:') !!}
    {!! Form::number('ware_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_company_id', 'User Company Id:') !!}
    {!! Form::number('user_company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Catalog Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_catalog_id', 'Shop Catalog Id:') !!}
    {!! Form::number('shop_catalog_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Best Before Field -->
<div class="form-group col-sm-6">
    {!! Form::label('best_before', 'Best Before:') !!}
    {!! Form::text('best_before', null, ['class' => 'form-control','id'=>'best_before']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#best_before').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Ware Return Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ware_return_id', 'Ware Return Id:') !!}
    {!! Form::number('ware_return_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount History Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_history', 'Amount History:') !!}
    {!! Form::text('amount_history', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Partial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_partial', 'Amount Partial:') !!}
    {!! Form::number('amount_partial', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Return Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_return', 'Amount Return:') !!}
    {!! Form::text('amount_return', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Price All Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_all', 'Price All:') !!}
    {!! Form::number('price_all', null, ['class' => 'form-control']) !!}
</div>

<!-- Price All Partial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_all_partial', 'Price All Partial:') !!}
    {!! Form::text('price_all_partial', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Price All Return Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_all_return', 'Price All Return:') !!}
    {!! Form::text('price_all_return', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Accepted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accepted', 'Accepted:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('accepted', 0) !!}
        {!! Form::checkbox('accepted', '1', null) !!}
    </label>
</div>


<!-- Check Return Field -->
<div class="form-group col-sm-6">
    {!! Form::label('check_return', 'Check Return:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('check_return', 0) !!}
        {!! Form::checkbox('check_return', '1', null) !!}
    </label>
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
    <a href="{{ route('shopOrderItems.index') }}" class="btn btn-light">Cancel</a>
</div>
