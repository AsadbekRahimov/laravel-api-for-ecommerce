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


<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', 'Currency:') !!}
    {!! Form::text('currency', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Percent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('percent', 'Percent:') !!}
    {!! Form::number('percent', null, ['class' => 'form-control']) !!}
</div>

<!-- Useful Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('useful_count', 'Useful Count:') !!}
    {!! Form::number('useful_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Min Price Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min_price_order', 'Min Price Order:') !!}
    {!! Form::number('min_price_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Coupon Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('coupon_code', 'Coupon Code:') !!}
    {!! Form::text('coupon_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::text('comment', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Published At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published_at', 'Published At:') !!}
    {!! Form::text('published_at', null, ['class' => 'form-control','id'=>'published_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#published_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Expired At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expired_at', 'Expired At:') !!}
    {!! Form::text('expired_at', null, ['class' => 'form-control','id'=>'expired_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#expired_at').datetimepicker({
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

<!-- Shop Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_category_id', 'Shop Category Id:') !!}
    {!! Form::number('shop_category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_product_id', 'Shop Product Id:') !!}
    {!! Form::number('shop_product_id', null, ['class' => 'form-control']) !!}
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