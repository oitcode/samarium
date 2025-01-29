<div>

  <h2>
    Login page
  </h2>
  <select>
    @foreach ($availableFiles as $af)
      <option value="{{ $af }}">{{ $af }}</option>
    @endforeach
  </select>

</div>
