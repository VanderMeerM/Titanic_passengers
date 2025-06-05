@extends('CSS.app')


@guest

<form action=" {{  route('auth.login') }}" method="get">
 @csrf

<div id="btn_login">
 
<input type="hidden" name="pass_id" value="{{  $passenger->Id }}">

<button type="submit"> <img class='loginout' src="../login.png">
</button>
</div>

@endguest

@auth

<form method="post" action="../logout">
 @csrf
<button type="submit"> <img class='loginout' src="../logout.png"> 
</button>
</form>

@endauth

{{ $passenger->Id }}

<div class="container_detail">

<a href=" {{ route('all.index') }}"
        id="name_detail">← Terug naar totaaloverzicht</a>

<p> 




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

Werkzaam in/op: 
<span {{ $passenger->Class === "Unknown" ? "style=font-style:italic" : null }}>
{{ \App\Models\Passenger::$class_translated[$passenger->Class] }} 

</span>

@else 

Voer mee in de {{ $passenger->Class[0] }}e klasse. 
<br>
@endif
@endif

<div>

@if ($passenger->Embarked != '')
Opgestapt in: 
<span {{ $passenger->Embarked === "Unknown" ? "style=font-style:italic" : null }}>
    {{ $passenger->Embarked === "Unknown" ? "onbekend" : $passenger->Embarked }} 
</span> 
@endif

</div>

<div>
@if ($passenger->Nationality != '')
Nationaliteit: 
<span {{ $passenger->Nationality === "Unknown" ? "style=font-style:italic" : null }}>
    {{ \App\Models\Passenger::$nationalities_translated[$passenger->Nationality] }} 
</span> 
@endif 
</div>

<div>
@if ($passenger->Job != '')
Functie: 
 {{ array_key_exists($passenger->Job, \App\Models\Passenger::$jobs_translated) ? 
\App\Models\Passenger::$jobs_translated[$passenger->Job] : $passenger->Job }}
@endif
 </div>

 <div>
@if ($passenger->Boat != '')
Zat in reddingsboot: {{ $passenger->Boat}}
@endif
 </div>

<p>

</div>
</div>
</div>

</body>

