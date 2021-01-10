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


<!-- User Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_company_id', 'User Company Id:') !!}
    {!! Form::number('user_company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_category_id', 'Shop Category Id:') !!}
    {!! Form::number('shop_category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Package Field -->
<div class="form-group col-sm-6">
    {!! Form::label('package', 'Package:') !!}
    {!! Form::text('package', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Shop Option Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_option', 'Shop Option:') !!}
    {!! Form::text('shop_option', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Lang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text_lang', 'Text Lang:') !!}
    {!! Form::text('text_lang', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Option Ids Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_option_ids', 'Shop Option Ids:') !!}
    {!! Form::text('shop_option_ids', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_brand_id', 'Shop Brand Id:') !!}
    {!! Form::number('shop_brand_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Related Field -->
<div class="form-group col-sm-6">
    {!! Form::label('related', 'Related:') !!}
    {!! Form::text('related', null, ['class' => 'form-control']) !!}
</div>

<!-- Shelf Life Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shelf_life', 'Shelf Life:') !!}
    {!! Form::number('shelf_life', null, ['class' => 'form-control']) !!}
</div>

<!-- Shelf Life Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shelf_life_unit', 'Shelf Life Unit:') !!}
    {!! Form::text('shelf_life_unit', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', 'Size:') !!}
    {!! Form::text('size', null, ['class' => 'form-control']) !!}
</div>

<!-- Offer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('offer', 'Offer:') !!}
    {!! Form::text('offer', null, ['class' => 'form-control']) !!}
</div>

<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', 'Rating:') !!}
    {!! Form::number('rating', null, ['class' => 'form-control']) !!}
</div>

<!-- Measure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('measure', 'Measure:') !!}
    {!! Form::text('measure', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
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