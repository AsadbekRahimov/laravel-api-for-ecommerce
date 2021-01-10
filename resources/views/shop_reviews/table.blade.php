<div class="table-responsive">
    <table class="table" id="shopReviews-table">
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
        <th>Shop Brand Id</th>
        <th>Shop Product Id</th>
        <th>User Company Id</th>
        <th>Rating</th>
        <th>Parent Id</th>
        <th>Rating Option</th>
        <th>Text</th>
        <th>Virtues</th>
        <th>Drawbacks</th>
        <th>Experience</th>
        <th>Recommend</th>
        <th>Anonymous</th>
        <th>Like</th>
        <th>Dislike</th>
        <th>Photo</th>
        <th>User Id</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopReviews as $shopReview)
            <tr>
                <td>{{ $shopReview->sort }}</td>
            <td>{{ $shopReview->name }}</td>
            <td>{{ $shopReview->name_lang }}</td>
            <td>{{ $shopReview->title }}</td>
            <td>{{ $shopReview->title_lang }}</td>
            <td>{{ $shopReview->tranz }}</td>
            <td>{{ $shopReview->accept }}</td>
            <td>{{ $shopReview->active }}</td>
            <td>{{ $shopReview->type }}</td>
            <td>{{ $shopReview->shop_brand_id }}</td>
            <td>{{ $shopReview->shop_product_id }}</td>
            <td>{{ $shopReview->user_company_id }}</td>
            <td>{{ $shopReview->rating }}</td>
            <td>{{ $shopReview->parent_id }}</td>
            <td>{{ $shopReview->rating_option }}</td>
            <td>{{ $shopReview->text }}</td>
            <td>{{ $shopReview->virtues }}</td>
            <td>{{ $shopReview->drawbacks }}</td>
            <td>{{ $shopReview->experience }}</td>
            <td>{{ $shopReview->recommend }}</td>
            <td>{{ $shopReview->anonymous }}</td>
            <td>{{ $shopReview->like }}</td>
            <td>{{ $shopReview->dislike }}</td>
            <td>{{ $shopReview->photo }}</td>
            <td>{{ $shopReview->user_id }}</td>
            <td>{{ $shopReview->deleted_by }}</td>
            <td>{{ $shopReview->deleted_text }}</td>
            <td>{{ $shopReview->modified_at }}</td>
            <td>{{ $shopReview->created_by }}</td>
            <td>{{ $shopReview->modified_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopReviews.destroy', $shopReview->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopReviews.show', [$shopReview->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopReviews.edit', [$shopReview->id]) }}" class='btn btn-default btn-xs'>
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
