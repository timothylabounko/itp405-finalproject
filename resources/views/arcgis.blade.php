@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container">
    <h1 class="mb-4">Home</h1>
    <div class="row">
        <br>
        <p style="text-align: center;">Welcome to the Chinatown Historical Business Database! This is an application where you can view both present, and past businesses in Chinatown. 
            Please fill out our form under the "Contribute" tab above. To register, please create a login username and password under the "Register" tab above. 
        </p>
        <br>
        <p style="text-align: center;">
            This website is a combined project for ITP 405 and PPD 499 classes at the University of Southern California. For ITP 405, class on Advanced Back End Development, the purpose of the final project was to 
            demonstrate your knowledge of databases, Model View Controller Frameworks, and API functionality. For PPD 499, class on how to use Geographic Information Systems and Design for community 
            engagement, the purpose of the project was to create an application that can be used to help communities. We met with representatives from community organizations
            that work with Chinatown to determine their needs, and I found that one thing missing was an application that showcased businesses that have come and gone. This is important for the 
            Chinatown community as much of this history is dissapearing, and records are hard to keep in one place. This is especially important now as many businesses are also facing eviction.
        </p>
        <br>
        <p style="text-align: center;">
            This website is ONLY A PROTOTYPE, but hopefully in the future this could be created into a more flushed out application. The main functionality that is missing is geographical, where 
            businesses can be filtered out by location, visualizations etc. This project was created during my senior year of undergrad, and a step forward for me in combining web development, software
            engineering, and geographic information systems. I am going to graduate school for this in the future and hope to keep developing these skills.
        </p>
    </div>
    <br>
    <br>
    <br>
    <h4>Example Mapping Application, Register to View the Full Application</h4>
    <br>
    <div class="row mt-4">
        <div class="col-md-12">
            <div style="border: 1px solid #ccc;">
                <iframe src="https://priceusc.maps.arcgis.com/apps/instant/interactivelegend/index.html?appid=eb4dd8d2ecfa4bf585319eb5e8d4e10e" width="100%" height="600px" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <h4>Some History, Background, and Perspectives of Chinatown LA</h4>
    <br>
    <p style="text-align: center;">Chinatown Los Angeles is one of the more unique Chinatown's that I have been to. I would describe it as one of the most "suburban" and "town like"
    Chinatown's that I have visited. It also a great place to find goods of any kind on the street, or at Dynasty Plaza; a mall like plaze with informal vendors.
    The architecture gives the neighborhood a unique character, and a lot of the staple businesses in the area exemplify that. For instance, Pheonix Bakery uses "orientalist"
    architecture, while also combining the "commercial" style of Los Angeles architecture; examples of this include the Felix the Cat dealership, and much of the architecture in Los Angeles
    Los Angeles drive thru and dine in establishments. The logo is created by the first Asian American Disney artist, who worked on the movie Bambi. To view this business, you can see the 
    architecture in the Register Page.
    </p>
    <br>
    <p style="text-align: center;">If you are interested in helping out, learning more, or just curious about Chinatown, I would highly reccomend checking out Chinatown
    Community for Equitable Development! They are currently helping out businesses that are under threat of eviction and historical legacy businesses. Check them out below!
    </p>
    <br>
    <p style="text-align: center;"><a href="https://www.ccedla.org/">Visit CCEDLA</a></p>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body text-center">
                    <img src="https://www.ace.aaa.com/content/ace-www/en/publications/travel/us-destinations/california/los-angeles-chinatown/_jcr_content/article-image.coreimg.jpeg/1652208616066/chinatown-1280.jpeg" class="img-fluid" style="max-width: 100%;">
                </div>
                <p style="text-align: center; margin-top: 10px;">Courtesy of AAA</p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <p style="text-align: center;">Created by Timothy Labounko 2024<p>
</div>
@endsection