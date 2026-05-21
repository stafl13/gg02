@extends('layout')

@section('content')

<div class="card" style="width:900px;">

    <h2>Мои заявки</h2>

    <a href="/applications/create">
        <button style="margin-bottom:20px;">
            Создать заявку
        </button>
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table width="100%" cellpadding="10">

        <tr>
            <th>Авто</th>
            <th>Дата</th>
            <th>Статус</th>
            <th>Причина</th>
        </tr>

        @foreach($applications as $application)

            <tr>

                <td>
                    {{ $application->car_brand }}
                    {{ $application->car_model }}
                </td>

                <td>
                    {{ $application->test_drive_date }}
                </td>

                <td>
                    {{ $application->status }}
                </td>

                <td>
                    {{ $application->reject_reason }}
                </td>

            </tr>

        @endforeach

    </table>

</div>

@endsection