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


        .table.table-bordered {
            border: 1px solid #63645E;
        }

        .table.table-bordered th,
        .table.table-bordered td {
            border: 1px solid #63645E;
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Ketersediaan Tempat Tidur</h1>
    </div>
    <div class="container col-10 col-sm-10 col-md-8 col-lg-6" id="table">
        <table class="table table-bordered table-striped table-line">
            <tr style="color: white; background-color: #283779; ">
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
        <div class="mt-2 mb-4 text-black font-weight-bold">
            Total Rawat Inap : 202 Tempat Tidur.
            <br>
            <p><i>*sesuai SK Direktur No. 445/2271/X/2025 tanggal 31 Oktober 2025.</i></p>
        </div>

        <div class="mt-2 text-danger font-weight-bold">
            <p><i>*{{ $note->content }}</i></p>
        </div>


    </div>
@endsection
