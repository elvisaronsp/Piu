@php
  $buttons = [
    [
      'name' => '',
      'url' => route("groups.create"),
      'feather_icon' => 'plus-circle'
    ]
  ];
@endphp
<div class="row">
  <div class="col-md-12 mb-1">
    <options-bar-component title="Turmas" :buttons="{{ collect($buttons) }}"></options-bar-component>
  </div>
</div>
<generic-table-component entity="groups"></generic-table-component>
