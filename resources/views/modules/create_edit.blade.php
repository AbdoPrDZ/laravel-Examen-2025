@extends('modules.layout')
@section('content')
<h2>{{ $title }}</h2>
<form action="{{ $action }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="module-name" class="form-label">Module name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="module-name" name="name" value="{{ old('name', $module?->name) }}">

    @if ($errors->has('name'))
      <div class="invalid-feedback">
        {{ $errors->first('name') }}
      </div>
    @endif
  </div>

  <div class="mb-3">
    <label for="module-hours" class="form-label">Module hours</label>
    <input type="number" class="form-control @error('hours') is-invalid @enderror" id="module-hours" name="hours" min="0" value="{{ old('hours', $module?->hours) }}">

    @if ($errors->has('hours'))
      <div class="invalid-feedback">
        {{ $errors->first('hours') }}
      </div>
    @endif
  </div>

  @if ($module)
    <button type="submit" class="btn btn-outline-warning">Update</button>
  @else
    <button type="submit" class="btn btn-outline-primary">Submit</button>
  @endif
</form>
@endsection
