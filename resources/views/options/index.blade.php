@php
  $buttons = [
    [
      'name' => '',
      'url' => route("students.create"),
      'feather_icon' => 'plus-circle'
    ]
  ];
@endphp
<div class="row">
  <div class="col-md-12 mb-1">
    <options-bar-component title="Opções do sistema" :buttons="{{ collect($buttons) }}"></options-bar-component>
  </div>
</div>
<generic-table-component entity="options"></generic-table-component>
