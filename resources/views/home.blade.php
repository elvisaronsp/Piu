@extends('layouts.app')
@section('content')
@php
  use Silber\Bouncer\Database\Ability;
  $user = Auth::user();
@endphp
<div class="container">
  <div class="row">
    <div class="col-2">
      <ul class="nav nav-pills flex-column text-center" id="pills-tab" role="tablist" aria-orientation="vertical">
        <li class="nav-item">
          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Principal</a>
        </li>
        <li class="nav-item">
          @if($user->can('view-employeers') || $user->isAn('admin'))
            <a class="nav-link" id="v-pills-employeers-tab" data-toggle="pill" href="#v-pills-employeers" role="tab" aria-controls="v-pills-employeers" aria-selected="false">Funcionários</a>
          @endif
        </li>
        <li class="nav-item">
          @if($user->can('view-stuffs') || $user->isAn('admin'))
            <a class="nav-link" id="v-pills-stuffs-tab" data-toggle="pill" href="#v-pills-stuffs" role="tab" aria-controls="v-pills-stuffs" aria-selected="false">Matérias</a>
          @endif
        </li>
        <li class="nav-item">
          @if($user->can('view-students') || $user->isAn('admin'))
            <a class="nav-link" id="v-pills-students-tab" data-toggle="pill" href="#v-pills-students" role="tab" aria-controls="v-pills-students" aria-selected="false">Alunos</a>
          @endif
        </li>
        <li class="nav-item">
          @if($user->can('view-groups') || $user->isAn('admin'))
            <a class="nav-link" id="v-pills-groups-tab" data-toggle="pill" href="#v-pills-groups" role="tab" aria-controls="v-pills-groups" aria-selected="false">Turmas</a>
          @endif
        </li>
        <li class="nav-item">
          @if($user->can('view-options') || $user->isAn('admin'))
            <a class="nav-link" id="v-pills-configurations-tab" data-toggle="pill" href="#v-pills-configurations" role="tab" aria-controls="v-pills-configurations" aria-selected="false">Configurações</a>
          @endif
        </li>
      </ul>
    </div>
    <div class="col-10">
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
