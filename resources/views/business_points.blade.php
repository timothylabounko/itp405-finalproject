@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <h1>Historical Database Content</h1>
    <br>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Business Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Business Type</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Year Founded</th>
                <th>Year Closed</th>
                <th>NAICS Code</th>
                <th>Photos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->business_name }}</td>
                    <td>{{ $data->business_address }}</td>
                    <td>{{ $data->business_phone }}</td>
                    <td>{{ $data->business_type }}
                    <td>{{ $data->business_lat }}</td>
                    <td>{{ $data->business_long }}</td>
                    <td>{{ $data->year_founded }}</td>
                    <td>{{ $data->year_closed }}</td>
                    <td>{{ $data->naics_code }}</td>
                    @if ($data->business_photos)
                        @foreach($data->business_photos as $photo)
                            <td><img src="{{ asset($photo) }}" alt="Business Photo"></td>
                        @endforeach
                    @else
                        <td>No Photos</td>
                    @endif
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
<br>
<p style="text-align: center;">Created by Timothy Labounko 2024</p>
@endsection
