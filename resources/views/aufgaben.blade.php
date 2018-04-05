@extends('layouts.app')

@section('content')
    <!-- Liste aller persönlichen ToDos -->
    @foreach ($todos as $todo)
        <div id="{{$todo->id}}">
            <div class="titel">
                {{ $todo->titel }}
                    <div class="">
                        <button value="{{$todo->id}}" class="btn-dell">x</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".btn-dell").click(function () {
            var idElementToDelete = $(this).val();
            var divToRemove = $('#'+idElementToDelete);

            $.ajax({
                type: 'POST',
                url: "deleteAjax",
                dataType: 'text',
                data: {
                    'id': idElementToDelete
                },
                success: function (data) {
                    $(divToRemove).remove();
                }
            });
        });
    });
</script>

