@extends('layouts.app')

@section('content')
    <div class="border-bottom mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">{{ $event->name }}</h1>
        </div>
        <span class="h6">{{ $event->date->format('F d, Y') }}</span>
    </div>

    <div class="mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h2 class="h4">Create new ticket</h2>
        </div>
    </div>

    <form class="needs-validation" novalidate action="{{ route('events.tickets.store', $event) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputName">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName"
                    name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputCost">Cost</label>
                <input type="number" class="form-control @error('cost') is-invalid @enderror" id="inputCost"
                    name="cost" value="{{ old('cost', 0) }}">
                @error('cost')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="selectSpecialValidity">Special Validity</label>
                <select class="form-control" id="selectSpecialValidity" name="special_validity">
                    <option value="" selected>None</option>
                    <option value="amount">Limited amount</option>
                    <option value="date">Purchasable till date</option>
                </select>
            </div>
        </div>

        <!-- Amount input, hidden by default -->
        <div class="row select-input" style="display: none;" data-input="amount">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputAmount">Maximum amount of tickets to be sold</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror"
                    id="inputAmount" name="amount" value="{{ old('amount', 0) }}">
                @error('amount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Date input, hidden by default -->
        <div class="row select-input" style="display: none;" data-input="date">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputValidTill">Tickets can be sold until</label>
                <input type="text" class="form-control @error('date') is-invalid @enderror"
                    id="inputValidTill" name="date" placeholder="yyyy-mm-dd HH:MM" value="{{ old('date') }}">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Save ticket</button>
        <a href="{{ route('events.show', $event) }}" class="btn btn-link">Cancel</a>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const select = document.getElementById('selectSpecialValidity');

            select.addEventListener('change', () => {
                const selectedValue = select.value;
                const inputs = document.querySelectorAll('.select-input');

                inputs.forEach(input => {
                    if (input.getAttribute('data-input') === selectedValue) {
                        input.style.display = 'block';
                    } else {
                        input.style.display = 'none';
                    }
                });
            });

            select.dispatchEvent(new Event('change'));
        });
    </script>
@endsection
