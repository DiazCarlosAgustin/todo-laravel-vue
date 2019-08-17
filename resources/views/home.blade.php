@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 p-0">
    <pagina-trabajos :user="{{auth()->user()}}" />
</div>
@endsection
