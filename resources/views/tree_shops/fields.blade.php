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


<!-- Root Field -->
<div class="form-group col-sm-6">
    {!! Form::label('root', 'Root:') !!}
    {!! Form::number('root', null, ['class' => 'form-control']) !!}
</div>

<!-- Lft Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lft', 'Lft:') !!}
    {!! Form::number('lft', null, ['class' => 'form-control']) !!}
</div>

<!-- Rgt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rgt', 'Rgt:') !!}
    {!! Form::number('rgt', null, ['class' => 'form-control']) !!}
</div>

<!-- Lvl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lvl', 'Lvl:') !!}
    {!! Form::number('lvl', null, ['class' => 'form-control']) !!}
</div>

<!-- Icon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icon', 'Icon:') !!}
    {!! Form::text('icon', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Icon Type Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('icon_type', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('icon_type', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('icon_type', 'Icon Type', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Activeorig Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('activeOrig', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('activeOrig', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('activeOrig', 'Activeorig', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Selected Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('selected', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('selected', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('selected', 'Selected', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Disabled Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('disabled', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('disabled', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('disabled', 'Disabled', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Readonly Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('readonly', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('readonly', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('readonly', 'Readonly', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Visible Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('visible', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('visible', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('visible', 'Visible', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Collapsed Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('collapsed', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('collapsed', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('collapsed', 'Collapsed', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Movable U Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('movable_u', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('movable_u', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('movable_u', 'Movable U', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Movable D Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('movable_d', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('movable_d', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('movable_d', 'Movable D', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Movable L Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('movable_l', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('movable_l', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('movable_l', 'Movable L', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Movable R Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('movable_r', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('movable_r', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('movable_r', 'Movable R', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Removable Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('removable', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('removable', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('removable', 'Removable', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Removable All Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('removable_all', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('removable_all', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('removable_all', 'Removable All', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Child Allowed Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('child_allowed', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('child_allowed', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('child_allowed', 'Child Allowed', ['class' => 'form-check-label']) !!}
    </div>
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