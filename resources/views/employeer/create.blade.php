<form action="{{ route('employeer.store') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-md-8 justify-content-center">
      @if(isset($errors))
        <error-component :errors="{{ $errors }}"></error-component>
      @endif
      <address-component></address-component>
      <employeer-data-component></employeer-data-component>
      <birth-component></birth-component>
      <general-registration-component></general-registration-component>
      <user-component></user-component>
      <button-bar-component button-label="Registrar funcionário"></button-bar-component>
    </div>
  </div>
</form>
