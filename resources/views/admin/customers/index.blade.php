@extends('admin.default')

@section('page-header')
    Customers <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        {{-- <a href="{{ route(ADMIN . '.customers.create') }}" class="btn btn-info">
            {{ trans('app.add_button') }}
        </a> --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleAdd">
            Add
        </button>
        <a href="{{ route(ADMIN . '.mail') }}" class="btn btn-primary">
            Send email
        </a>
        @include('admin.customers.create')
    </div>


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                
                <tbody id="search">
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->conutry }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ route(ADMIN . '.customers.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleEdit{{ $item->id }}"><span class="ti-pencil"></span></a></li>
                                        @include('admin.customers.edit')
                                    <li class="list-inline-item">
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.customers.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]) 
                                        !!}
    
                                            <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>
                                            
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $items->links() }}
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('#keyword').change(function(){
            keyword = $('#keyword').val();
            $.ajax({
                type: "get",
                url: "/search/"+keyword,
                success: function (response) {
                    $('#search').empty;
                    $('#search').html(response);
                }
            });
        })
    </script>
@endsection