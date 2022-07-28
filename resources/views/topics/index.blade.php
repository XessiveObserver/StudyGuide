@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Study Guide </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('topics.create') }}"> Create New Topic</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $topic->title }}</td>
                <td>{{ $topic->description }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('topics.show', $topic->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('topics.edit', $topic->id) }}">Edit</a>
                    <form action="{{ route('topics.destroy', $topic->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
