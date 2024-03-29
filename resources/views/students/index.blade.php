@php
  $buttons = [
    [
      'name' => '',
      'url' => route("students.create"),
      'feather_icon' => 'plus-circle'
    ]
  ];
@endphp
<search-box-component entity="students"></search-box-component>
<div class="row">
  <div class="col-md-12 mb-1">
    <options-bar-component title="Alunos" :buttons="{{ collect($buttons) }}"></options-bar-component>
  </div>
</div>
<generic-table-component entity="students"></generic-table-component>
