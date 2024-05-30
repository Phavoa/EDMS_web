@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <script>
      Materialize.toast("{{ $error }}")
    </script>
  @endforeach
@endif

 
