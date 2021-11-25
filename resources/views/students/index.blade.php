@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><strong>CRUD ABSENSI</strong></h2>
            </div>
            &nbsp;
            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('students.create') }}">
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

    <table class="table table-bordered ">
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->rombel }}</td>
            <td>{{ $student->rayon }}</td>
            <td>{{ $student->ket}}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">
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

    {!! $students->links() !!}

@endsection