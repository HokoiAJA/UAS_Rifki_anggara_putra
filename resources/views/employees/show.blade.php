@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employee Detail</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama: {{ $employees->name }}</h5>
                <p class="card-text"><strong>NIP:</strong> {{ $employees->nip }}</p>
                <p class="card-text"><strong>Department:</strong> {{ $employees->department }}</p>
                <p class="card-text"><strong>Position:</strong> {{ $employees->position }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $employees->email }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $employees->phone }}</p>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
