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

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment', 'Payment:') !!}
    {!! Form::number('payment', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Processor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('processor', 'Processor:') !!}
    {!! Form::text('processor', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
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

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('details', 'Details:') !!}
    {!! Form::text('details', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
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
    <a href="{{ route('shopPayments.index') }}" class="btn btn-light">Cancel</a>
</div>
