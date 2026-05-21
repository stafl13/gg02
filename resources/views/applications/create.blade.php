@extends('layout')

@section('content')

<div class="card" style="width:650px;">

    <h2>Тест-драйв</h2>

    <form method="POST">

        @csrf

        <div class="form-group">
            <label>Адрес</label>
            <input type="text" name="address">
        </div>

        <div class="form-group">
            <label>Телефон</label>
            <input
                type="text"
                name="phone"
                placeholder="+7(999)-999-99-99"
            >
        </div>

        <div class="form-group">
            <label>Дата</label>
            <input type="date" name="test_drive_date">
        </div>

        <div class="form-group">
            <label>Время</label>
            <input type="time" name="test_drive_time">
        </div>

        <div class="form-group">
            <label>Серия ВУ</label>
            <input type="text" name="license_series">
        </div>

        <div class="form-group">
            <label>Номер ВУ</label>
            <input type="text" name="license_number">
        </div>

        <div class="form-group">
            <label>Дата выдачи ВУ</label>
            <input type="date" name="license_date">
        </div>

        <div class="form-group">

            <label>Марка</label>

            <select name="car_brand" id="brand-select">

                @foreach($cars as $brand => $models)

                    <option value="{{ $brand }}">
                        {{ $brand }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="form-group">

            <label>Модель</label>

            <select name="car_model">

                <option>Camry</option>

            </select>
        </div>

        <div class="form-group">

            <label>Оплата</label>

            <select name="payment_type">

                <option value="Наличные">
                    Наличные
                </option>

                <option value="Карта">
                    Банковская карта
                </option>

            </select>
        </div>

        <div style="margin-bottom:20px;">

            <input type="checkbox" id="agree">

            <label for="agree">
                Я ознакомлен с правилами
            </label>

        </div>

        <button id="submit-btn" disabled>
            Отправить заявку
        </button>

    </form>
</div>

<script>

const checkbox = document.getElementById('agree');
const button = document.getElementById('submit-btn');

checkbox.addEventListener('change', () => {

    button.disabled = !checkbox.checked;
});

</script>

@endsection