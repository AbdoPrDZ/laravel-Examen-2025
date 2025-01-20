@extends('modules.layout')
@section('content')
  <h1>Modules</h1>

  <form action="{{ route('modules.index') }}" method="GET" class="mb-3">
    <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="Search modules" value="{{ $search }}">
      <div class="input-group-append">
        <button class="btn btn-outline-primary" type="submit">Search</button>
        <a href="{{ route('modules.index') }}" class="btn btn-outline-secondary">Reset</a>
      </div>
    </div>
  </form>

  <div class="d-flex gap-2 mb-3">
    <a href="{{ route('modules.create') }}" class="btn btn-outline-primary">Create</a>
    <a href="{{ route('modules.factory') }}" class="btn btn-outline-warning">Factory</a>
    <a href="{{ route('modules.delete') }}" class="btn btn-outline-danger">Delete All</a>
  </div>

  <table class="table table-dark table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">
          #
          <a href="{{ route('modules.index', ['sort' => 'id', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
            <i class="fas fa-sort{{ $sort == 'id'? ($order == 'asc' ? '-up' :  '-down') : '' }}"></i>
          </a>
        </th>
        <th scope="col">
          Name
          <a href="{{ route('modules.index', ['sort' => 'name', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
            <i class="fas fa-sort{{ $sort == 'name' ? ($order == 'asc' ? '-up' : '-down') : '' }}"></i>
          </a>
        </th>
        <th scope="col">
          Hours
          <a href="{{ route('modules.index', ['sort' => 'hours', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
            <i class="fas fa-sort{{ $sort == 'hours' ? ($order == 'asc' ? '-up' : '-down') : '' }}"></i>
          </a>
        </th>
        <th scope="col">
          Date
          <a href="{{ route('modules.index', ['sort' => 'created_at', 'order' => $order == 'asc' ? 'desc' : 'asc']) }}">
            <i class="fas fa-sort{{ $sort == 'created_at' ? ($order == 'asc' ? '-up' : '-down') : '' }}"></i>
          </a>
        </th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @if ($modules->isEmpty())
        <tr>
          <td colspan="5" class="text-center">No modules found.</td>
        </tr>
      @endif
      @foreach ($modules as $module)
        <tr>
          <th scope="row">{{ $module->id }}</th>
          <td>{{ $module->name }}</td>
          <td>{{ $module->hours }}</td>
          <td>{{ $module->created_at->format('d/m/Y') }}</td>
          <td>
            <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-link btn-warning">Edit</a>
            <a href="{{ route('modules.destroy', $module->id) }}" class="btn btn-link btn-danger">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $modules->links('pagination::bootstrap-5') }}

@endsection
