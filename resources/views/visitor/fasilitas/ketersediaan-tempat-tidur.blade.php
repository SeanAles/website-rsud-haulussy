@extends('visitor.layout.main')

@section('title', 'Ketersediaan Tempat Tidur')

@section('style')
    <style>
        #table {
            z-index: 1;
            background-color: white;
            padding: 0;
        }

        .witdh-fit {
            white-space: nowrap;
            width: 1%;
        }

        /* .tb-header{
            background-color: #283779;
            color: white;
        } */
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="text-center mb-5">
            <h1>Ketersediaan Tempat Tidur</h1>
        </div>
        <div class="container col-10 col-sm-10 col-md-8 col-lg-6" id="table">
            <table class="table table-bordered table-striped">
                <tr style="color: white; background-color: #283779">
                    <th>No.</th>
                    <th>Nama Ruangan</th>
                    <th class="text-end witdh-fit">Ketersediaan</th>
                </tr>
                @foreach ($beds as $bed)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bed->room }}</td>
                        <td class="text-end">{{ $bed->availability }}</td>
                    </tr>
                @endforeach
            </table>

            <div class="mt-2 text-danger font-weight-bold">
                <p><i>*{{ $note->content }}</i></p>
            </div>
        </div>


    </section>
@endsection
