@extends('CSS.app')


<div id="btn_login">
<a href="./login">
    <img src="../login.png">
</a>
</div>

<div class="container_detail">

<a href=" {{ route('all.index') }}"
        id="name_detail">← Terug naar overzicht van passagiers</a>

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

<img src="../images/{{$passenger->Image}}">

@endif

<form action=" {{ route('all.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file_upload">
    <button type="submit">Foto uploaden</button>
</form>

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

