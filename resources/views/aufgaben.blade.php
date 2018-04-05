@extends('layouts.app')
@section('content')
    <!-- Liste aller persönlichen ToDos -->
    @foreach ($todos as $todo)
        <div id="{{$todo->id}}">
            <div class="titel">
                {{ $todo->titel }}
                    <div class="">
                        <button value="{{$todo->id}}">x</button>
                    </div>
            </div>
            <div>Titel:
                {{ $todo->title }}
            </div>
            <div>Beschreibung:
                {{ $todo->description }}
            </div>
            <div>Priorität:
                {{ $todo->priority }}
            </div>
            <div>Aufwand:
                {{ $todo->duration }}
            </div>
            <div>Ort:
                {{ $todo->location }}
            </div>
        </div>
        </br>
    @endforeach
    <!-- Liste aller persönlichen ToDos ENDE -->
@endsection


