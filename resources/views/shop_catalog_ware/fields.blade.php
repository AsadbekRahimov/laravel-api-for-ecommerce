<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', 'Sort:') !!}
    {!! Form::number('sort', null, ['class' => 'form-control']) !!}
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


<!-- Shop Catalog Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_catalog_id', 'Shop Catalog Id:') !!}
    {!! Form::number('shop_catalog_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ware Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ware_id', 'Ware Id:') !!}
    {!! Form::number('ware_id', null, ['class' => 'form-control']) !!}
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
    <a href="{{ route('shopCatalogWare.index') }}" class="btn btn-light">Cancel</a>
</div>
