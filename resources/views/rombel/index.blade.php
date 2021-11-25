@extends('layout.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Rombel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rombel.create') }}"> 
                <i class="fas fa-plus"></i>&nbsp;</i>Create</a>
            </div>
        </div> 
        &nbsp;
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Rombel</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rombel as $rombel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rombel->nama_rombel }}</td>
            <td>
                <form action="{{ route('rombel.destroy',$rombel->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('rombel.edit',$rombel->id) }}">
                    <i class="fas fa-edit">&nbsp;</i>Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt">&nbsp;</i>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
        
@endsection