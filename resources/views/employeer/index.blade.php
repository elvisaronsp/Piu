@php
  $buttons = [
    [
      'name' => '',
      'url' => route("employeer.create"),
      'feather_icon' => 'user-plus'
    ]
  ];
@endphp
<div class="row">
  <div class="col-md-12 mb-1">
    <options-bar-component title="Funcionários" :buttons="{{ collect($buttons) }}"></options-bar-component>
  </div>
</div>
<generic-table-component entity="employeers"></generic-table-component>
