@php
  $buttons = [
    [
      'name' => '',
      'url' => route("stuffs.create"),
      'feather_icon' => 'plus-circle'
    ]
  ];
@endphp
<search-box-component entity="stuffs"></search-box-component>
<div class="row">
  <div class="col-md-12 mb-1">
    <options-bar-component title="Matérias" :buttons="{{ collect($buttons) }}"></options-bar-component>
  </div>
</div>
<generic-table-component entity="stuffs"></generic-table-component>
