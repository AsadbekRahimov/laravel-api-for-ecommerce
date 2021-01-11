<div class="table-responsive">
    <table class="table" id="shopBanners-table">
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
        <th>Lang</th>
        <th>Image</th>
        <th>Link</th>
        <th>Common</th>
        <th>Deleted By</th>
        <th>Deleted Text</th>
        <th>Modified At</th>
        <th>Created By</th>
        <th>Modified By</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopBanners as $shopBanner)
            <tr>
                       <td>{{ $shopBanner->sort }}</td>
            <td>{{ $shopBanner->name }}</td>
            <td>{{ $shopBanner->name_lang }}</td>
            <td>{{ $shopBanner->title }}</td>
            <td>{{ $shopBanner->title_lang }}</td>
            <td>{{ $shopBanner->tranz }}</td>
            <td>{{ $shopBanner->accept }}</td>
            <td>{{ $shopBanner->active }}</td>
            <td>{{ $shopBanner->user_company_id }}</td>
            <td>{{ $shopBanner->lang }}</td>
            <td>{{ $shopBanner->image }}</td>
            <td>{{ $shopBanner->link }}</td>
            <td>{{ $shopBanner->common }}</td>
            <td>{{ $shopBanner->deleted_by }}</td>
            <td>{{ $shopBanner->deleted_text }}</td>
            <td>{{ $shopBanner->modified_at }}</td>
            <td>{{ $shopBanner->created_by }}</td>
            <td>{{ $shopBanner->modified_by }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['shopBanners.destroy', $shopBanner->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('shopBanners.show', [$shopBanner->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('shopBanners.edit', [$shopBanner->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
