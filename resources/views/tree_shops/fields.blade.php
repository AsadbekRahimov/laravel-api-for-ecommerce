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
    {!! Form::label('icon_type', 'Icon Type:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('icon_type', 0) !!}
        {!! Form::checkbox('icon_type', '1', null) !!}
    </label>
</div>


<!-- Activeorig Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activeOrig', 'Activeorig:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activeOrig', 0) !!}
        {!! Form::checkbox('activeOrig', '1', null) !!}
    </label>
</div>


<!-- Selected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('selected', 'Selected:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('selected', 0) !!}
        {!! Form::checkbox('selected', '1', null) !!}
    </label>
</div>


<!-- Disabled Field -->
<div class="form-group col-sm-6">
    {!! Form::label('disabled', 'Disabled:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('disabled', 0) !!}
        {!! Form::checkbox('disabled', '1', null) !!}
    </label>
</div>


<!-- Readonly Field -->
<div class="form-group col-sm-6">
    {!! Form::label('readonly', 'Readonly:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('readonly', 0) !!}
        {!! Form::checkbox('readonly', '1', null) !!}
    </label>
</div>


<!-- Visible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visible', 'Visible:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('visible', 0) !!}
        {!! Form::checkbox('visible', '1', null) !!}
    </label>
</div>


<!-- Collapsed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('collapsed', 'Collapsed:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('collapsed', 0) !!}
        {!! Form::checkbox('collapsed', '1', null) !!}
    </label>
</div>


<!-- Movable U Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movable_u', 'Movable U:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('movable_u', 0) !!}
        {!! Form::checkbox('movable_u', '1', null) !!}
    </label>
</div>


<!-- Movable D Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movable_d', 'Movable D:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('movable_d', 0) !!}
        {!! Form::checkbox('movable_d', '1', null) !!}
    </label>
</div>


<!-- Movable L Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movable_l', 'Movable L:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('movable_l', 0) !!}
        {!! Form::checkbox('movable_l', '1', null) !!}
    </label>
</div>


<!-- Movable R Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movable_r', 'Movable R:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('movable_r', 0) !!}
        {!! Form::checkbox('movable_r', '1', null) !!}
    </label>
</div>


<!-- Removable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('removable', 'Removable:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('removable', 0) !!}
        {!! Form::checkbox('removable', '1', null) !!}
    </label>
</div>


<!-- Removable All Field -->
<div class="form-group col-sm-6">
    {!! Form::label('removable_all', 'Removable All:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('removable_all', 0) !!}
        {!! Form::checkbox('removable_all', '1', null) !!}
    </label>
</div>


<!-- Child Allowed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('child_allowed', 'Child Allowed:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('child_allowed', 0) !!}
        {!! Form::checkbox('child_allowed', '1', null) !!}
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
    <a href="{{ route('treeShops.index') }}" class="btn btn-light">Cancel</a>
</div>
