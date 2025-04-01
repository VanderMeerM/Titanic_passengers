@extends('CSS.app')


<div> 

<div class="container_detail">

<a href=" {{ route('passengers.index') }}"
        id="name_detail">← Terug naar overzicht van passagiers</a>

<p> 

@if ($passenger->Image !=null)

<img src="../images/{{$passenger->Image}}">

@endif

    <div id="name_detail">
{{ $passenger->Name }} ({{ $passenger->Age }}) 

@if ($passenger->Survived === 'Lost')

† 
@endif

</p>

Voer mee in {{ $passenger->Class }}e klasse. 
<br>
Opgestapt in: {{$passenger->Embarked}}
<br>
Nationaliteit: {{  $passenger->Nationality }}
<p>

</div>
</div>
</div>

</body>

