@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <h1>Contribution Survey Form</h1>
    <br>
    <div class="row">
        <p style="text-align: center;">Submit your business information here! Your business information will be populated on our map, and you can view the information
        in our database. You will need to be logged in to see this information. The is a PROTOTYPE website, so there is no checking of accurate information, or procudure of filtering out accurate data. The map that will result from this 
        information also has had limited work on it.
        </p>
        <br>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Business Information Survey</div>
                <div class="card-body">
                    <form action="{{ route('submit_survey') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="business_name">Business Name</label>
                            <input type="text" class="form-control" id="business_name" name="business_name" required>
                        </div>
                        <div class="form-group">
                            <label for="business_address">Business Address</label>
                            <input type="text" class="form-control" id="business_address" name="business_address" required>
                        </div>
                        <div class="form-group">
                            <label for="business_phone">Business Phone Number</label>
                            <input type="text" class="form-control" id="business_phone" name="business_phone" required>
                        </div>
                        <div class="form-group">
                            <label for="business_type">Business Type</label>
                            <input type="text" class="form-control" id="business_type" name="business_type" required>
                        </div>
                        <div class="form-group">
                            <label for="business_lat">Latitude</label>
                            <input type="text" class="form-control" id="business_lat" name="business_lat" required>
                        </div>
                        <div class="form-group">
                            <label for="business_long">Longitude</label>
                            <input type="text" class="form-control" id="business_long" name="business_long" required>
                        </div>
                        <div class="form-group">
                            <label for="year_founded">Year Founded</label>
                            <input type="text" class="form-control" id="year_founded" name="year_founded" required>
                        </div>
                        <div class="form-group">
                            <label for="year_closed">Year Closed</label>
                            <input type="text" class="form-control" id="year_closed" name="year_closed">
                        </div>
                        <div class="form-group">
                            <label for="naics_code">NAICS Code</label>
                            <input type="text" class="form-control" id="naics_code" name="naics_code" required>
                        </div>
                        <div class="form-group">
                            <label for="business_photos">Business Photos</label>
                            <input type="file" class="form-control-file" id="business_photos" name="business_photos[]" multiple accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="https://i.pinimg.com/736x/1f/a3/70/1fa3708093b53e41eabb4df9a8cec913.jpg" alt="Teal Border Image" style="width: 100%; height: auto;">
                    <p style="text-align: center; margin-top: 10px;">Courtesy of Shaker the Clown</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<p style="text-align: center;">Created by Timothy Labounko 2024<p>
@endsection
