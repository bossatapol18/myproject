@extends('bootstrap-theme')

@section('content')


<h1>Staff</h1>
<a href="{{ url('/staffs/create') }}" class="btn btn-sm btn-success mr-4">New Record</a> 
<form action="{{ url('/staffs') }}" method="GET" class="my-4">
    <input name="search" id="search" value="{{ request('search') }}" />
    <button type="submit">Search</button>
</form>

<table class="table table-sm table-bordered text-right" style="width:85%" >
    <tr>
        <th>#</th> <th>Name</th> <th>Age</th> <th>Salary</th> <th>Phone</th><th>Actions</th>  
    </tr>
    @foreach($staffs as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->Name }}</td>
        <td>{{ $item->Age }}</td>
        <td>{{ $item->Salary }}</td>
        <td>{{$item->Phone}}</td>
    
        <td>
            <a href="{{ url('/staffs/'.$item->id ) }}" class="btn btn-sm btn-primary">View</a>
            <a href="{{ url('/staffs/'.$item->id.'/edit' ) }}" class="btn btn-sm btn-warning">Edit</a>

            <form method="POST" action="{{ url('/staffs' . '/' . $item->id) }}" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirm delete?')">
                    Delete
                </button>
            </form>

        </td>
        
    </tr>
    @endforeach
</table>
   
        <div class="mt-4 mx-auto" >{{ $staffs->appends(['search' => request('search')])->links() }}</div>
    
@endsection
