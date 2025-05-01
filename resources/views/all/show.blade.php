@extends('CSS.app')


@guest

<!--
<form action=" {{  route('auth.login') }}" method="post">
 @csrf
 --->

<div id="btn_login">
 <a href="{{  route('auth.login') }}" >
<input type="hidden" name="pass_id" value="{{  $passenger->Id }}">
<img src="../login.png">
</a>
</div>
<!--<button type="submit"> -->
  



@endguest

{{ $passenger->Id }}

<div class="container_detail">

<a href=" {{ route('all.index') }}"
        id="name_detail">← Terug naar overzicht van passagiers</a>

<p> 

@auth
<div>
<a href=" {{ route('auth.logout') }}">
    <img src="../logout.png">
</a>
</div>
@endauth


  @php $classes_crew = [];
  @endphp

 @foreach ($classes as $cc) 
@php 
array_push($classes_crew, $cc['Class']); 
@endphp 

@endforeach

@php 
$classes_crew = array_slice($classes_crew, 6);
@endphp


@if ($passenger->Image !=null)

<img class="img_pass" src="../images/{{$passenger->Image}}">

@endif

@auth

<form action=" {{ route('file.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <input type="hidden" name="pass_id" value = {{  $passenger->Id }}>
    <button type="submit">Foto uploaden</button>
</form>

@endauth

    <div id="name_detail">
{{ $passenger->Name }} ({{ $passenger->Age }}) 

@if ($passenger->Survived === 'Lost')

† 
@endif

</p>

@if ($passenger->Class != '')

@if (in_array( $passenger->Class, $classes_crew,)) 

Was werkzaam in {{ $passenger->Class }}
<br>

@else 

Voer mee in de {{ $passenger->Class[0] }}e klasse. 
<br>
@endif
@endif

@if ($passenger->Embarked != '')
Opgestapt in: {{$passenger->Embarked}}
<br>
@endif

@if ($passenger->Nationality != '')
Nationaliteit: {{  $passenger->Nationality }}
<br>
@endif

@if ($passenger->Job != '')
Werkte als: {{  $passenger->Job }}
<br>
@endif

@if ($passenger->Boat != '')
Zat in reddingsboot: {{ $passenger->Boat}}
<br>
@endif

<p>

</div>
</div>
</div>

</body>

