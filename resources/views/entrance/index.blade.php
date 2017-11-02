@extends('welcome')
@section('content')
    <div class="block">
        <h1>welkom Bij de grote CaraPils Competitie</h1>
        <div class="text">

            <p>Wij bij cara willen wel eens weten wat er bij onze fans leeft, en hoe jullie jullie overheerlijke (al dan niet lauwe) Cara Pils drinken. <br>Daarom hebben wij een gloednieuw concept bedacht. Stuur een foto door van hoe jij jouw cara op de meest originele manier drinkt en wie weet wordt jij een van de nieuwe gezichten van onze reclamecampagne. En dat niet alleen, de winnaars krijgen ook nog eens een <b>gratis</b> cara toegestuurd</p>
           @if($comp)
            <a href="/wedstrijd" class="btn btn-cara">Neem deel!</a>
            @else
               <h2 class="cara-letters">Er is momenteel geen wedstrijd actief</h2>
            @endif
            @if($ad)
                <a href="admin">naar admin panel</a>
                @endif


        </div>

 </div>
    <div class="block">
        <div class="text">
            <a href="/stem" class="btn btn-cara">Stem op de inzendingen</a>
        </div>
    </div>

    <div class="block">
        <h1>vorige winnaars</h1>
        <div class="text">
                @if($winnaars!== null)
                @foreach($winnaars as $w)
                    <div>
                        <h3>{{$w->registration->name}}</h3>
                    </div>

                    @endforeach
                    @endif
            @if($winnaars == null)
                <p>Er zijn nog geen winnaars geselecteerd.</p>
                @endif
        </div>
    </div>


@endsection