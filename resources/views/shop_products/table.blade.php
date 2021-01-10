<div class="table-responsive">
    <table class="table" id="shopProducts-table">
        <thead>
            <tr>
                <th>Sort</th>
        <th>Name</th>
        <th>Name Lang</th>
        <th>Title</th>
        <th>Title Lang</th>
        <th>Tranz</th>
        <th>Accept</th>
        <th>Active</th>
        <th>User Company Id</th>
        <th>Shop Category Id</th>
        <th>Package</th>
        <th>Shop Option</th>
        <th>Text</th>
        <th>Text Lang</th>
        <th>Image</th>
        <th>Shop Option Ids</th>
        <th>Shop Brand Id</th>
        <th>Related</th>
        <th>Shelf Life</th>
        <th>Shelf Life Unit</th>
        <th>Weight</th>
        <th>Size</th>
        <th>Offer</th>
        <th>Rating</th>
        <th>Measure</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopProducts as $shopProduct)
            <tr>
                <td>{{ $shopProduct->sort }}</td>
            <td>{{ $shopProduct->name }}</td>
            <td>{{ $shopProduct->name_lang }}</td>
            <td>{{ $shopProduct->title }}</td>
            <td>{{ $shopProduct->title_lang }}</td>
            <td>{{ $shopProduct->tranz }}</td>
            <td>{{ $shopProduct->accept }}</td>
            <td>{{ $shopProduct->active }}</td>
            <td>{{ $shopProduct->user_company_id }}</td>
            <td>{{ $shopProduct->shop_category_id }}</td>
            <td>{{ $shopProduct->package }}</td>
            <td>{{ $shopProduct->shop_option }}</td>
            <td>{{ $shopProduct->text }}</td>
            <td>{{ $shopProduct->text_lang }}</td>
            <td>{{ $shopProduct->image }}</td>
            <td>{{ $shopProduct->shop_option_ids }}</td>
            <td>{{ $shopProduct->shop_brand_id }}</td>
            <td>{{ $shopProduct->related }}</td>
            <td>{{ $shopProduct->shelf_life }}</td>
            <td>{{ $shopProduct->shelf_life_unit }}</td>
            <td>{{ $shopProduct->weight }}</td>
            <td>{{ $shopProduct->size }}</td>
            <td>{{ $shopProduct->offer }}</td>
            <td>{{ $shopProduct->rating }}</td>
            <td>{{ $shopProduct->measure }}</td>
            <td>{{ $shopProduct->deleted_by }}</td>
            <td>{{ $shopProduct->deleted_text }}</td>
            <td>{{ $shopProduct->modified_at }}</td>
            <td>{{ $shopProduct->created_by }}</td>
            <td>{{ $shopProduct->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopProducts.destroy', $shopProduct->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopProducts.show', [$shopProduct->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopProducts.edit', [$shopProduct->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
