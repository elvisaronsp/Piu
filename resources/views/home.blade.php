@extends('layouts.app')
@section('content')
@php
  use Silber\Bouncer\Database\Ability;
  $user = Auth::user();
@endphp
<div class="container">
  <div class="row">
    <div class="col-12">
      <!-- Aqui ficará a lógica de exibição de páginas de acordo com o tipo de usuário. As páginas serão componentes Vuejs-->
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            @include('welcome')
        </div>
        <div class="tab-pane fade" id="v-pills-employeers" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            @include('employeers.index')
        </div>
          @if($user->can('view-stuffs') || $user->isAn('admin'))
          <div class="tab-pane fade" id="v-pills-stuffs" role="tabpanel" aria-labelledby="v-pills-stuffs-tab">
              @include('stuffs.index')
          </div>
          @endif
          <div class="tab-pane fade" id="v-pills-employeers" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              @include('employeers.index')
          </div>
          @if($user->can('view-stuffs') || $user->isAn('admin'))
            <div class="tab-pane fade" id="v-pills-stuffs" role="tabpanel" aria-labelledby="v-pills-stuffs-tab">
                @include('stuffs.index')
            </div>
          @endif
          @if($user->can('view-students') || $user->isAn('admin'))
            <div class="tab-pane fade" id="v-pills-students" role="tabpanel" aria-labelledby="v-pills-students-tab">
                @include('students.index')
            </div>
          @endif
          @if($user->can('view-groups') || $user->isAn('admin'))
            <div class="tab-pane fade" id="v-pills-groups" role="tabpanel" aria-labelledby="v-pills-groups-tab">
                @include('groups.index')
            </div>
          @endif
          @if($user->can('view-options') || $user->isAn('admin'))
            <div class="tab-pane fade" id="v-pills-configurations" role="tabpanel" aria-labelledby="v-pills-configurations-tab">
                @include('options.index')
            </div>
          @endif
        </div>
      </div>
  </div>  
</div>
@endsection
