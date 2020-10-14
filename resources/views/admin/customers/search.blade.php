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
                    <a href="{{ route(ADMIN . '.customers.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleEdit"><span class="ti-pencil"></span></a></li>
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