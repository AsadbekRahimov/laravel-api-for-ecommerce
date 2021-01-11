<div class="table-responsive">
    <table class="table" id="shopCoupons-table">
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
        <th>Type</th>
        <th>Price</th>
        <th>Currency</th>
        <th>Percent</th>
        <th>Useful Count</th>
        <th>Min Price Order</th>
        <th>Coupon Code</th>
        <th>Comment</th>
        <th>Published At</th>
        <th>Expired At</th>
        <th>Status</th>
        <th>Shop Category Id</th>
        <th>Shop Product Id</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopCoupons as $shopCoupon)
            <tr>
                       <td>{{ $shopCoupon->sort }}</td>
            <td>{{ $shopCoupon->name }}</td>
            <td>{{ $shopCoupon->name_lang }}</td>
            <td>{{ $shopCoupon->title }}</td>
            <td>{{ $shopCoupon->title_lang }}</td>
            <td>{{ $shopCoupon->tranz }}</td>
            <td>{{ $shopCoupon->accept }}</td>
            <td>{{ $shopCoupon->active }}</td>
            <td>{{ $shopCoupon->type }}</td>
            <td>{{ $shopCoupon->price }}</td>
            <td>{{ $shopCoupon->currency }}</td>
            <td>{{ $shopCoupon->percent }}</td>
            <td>{{ $shopCoupon->useful_count }}</td>
            <td>{{ $shopCoupon->min_price_order }}</td>
            <td>{{ $shopCoupon->coupon_code }}</td>
            <td>{{ $shopCoupon->comment }}</td>
            <td>{{ $shopCoupon->published_at }}</td>
            <td>{{ $shopCoupon->expired_at }}</td>
            <td>{{ $shopCoupon->status }}</td>
            <td>{{ $shopCoupon->shop_category_id }}</td>
            <td>{{ $shopCoupon->shop_product_id }}</td>
            <td>{{ $shopCoupon->deleted_by }}</td>
            <td>{{ $shopCoupon->deleted_text }}</td>
            <td>{{ $shopCoupon->modified_at }}</td>
            <td>{{ $shopCoupon->created_by }}</td>
            <td>{{ $shopCoupon->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopCoupons.destroy', $shopCoupon->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopCoupons.show', [$shopCoupon->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopCoupons.edit', [$shopCoupon->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
