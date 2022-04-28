<div class="weather">
    {{-- <div id="main-wrapper"> --}}
    <div id="floating-snap-btn-wrapper">
        <!-- BEGIN :: Floating Button -->
        <div class="fab-btn">
            <div id="loading" style="display: none">
                <svg style="height: 100%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    style="margin: auto; background: none; display: block; shape-rendering: auto;" viewBox="0 0 100 100"
                    preserveAspectRatio="xMidYMid">
                    <circle v-if="dark == 'dark'" cx="50" cy="50" r="44" stroke-width="9" stroke="#1f2937"
                        stroke-dasharray="69.11503837897544 69.11503837897544" fill="none" stroke-linecap="round">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite"
                            dur="0.7042253521126761s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                    </circle>
                    <circle v-else cx="50" cy="50" r="44" stroke-width="9" stroke="#f3f4f6"
                        stroke-dasharray="69.11503837897544 69.11503837897544" fill="none" stroke-linecap="round">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite"
                            dur="0.7042253521126761s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                    </circle>
                </svg>
            </div>
            <div id="infoWeather" style="display: none; width: 100%">
                <h2 style="text-align: center">Current weather</h2>
                <div class="weather">
                    <img src="http://openweathermap.org/img/wn/10d@4x.png" alt="weather" id="imgWeather">
                    <div class="temperature">
                        <span id="tempWeather">31</span><sup>o</sup>C
                    </div>
                </div>
            </div>
            <div id="errorWeather" style="display: none; width: 100%; font-size: 12px; text-align: center">
                Location service seems off . . .
            </div>
        </div>
        <!-- END :: Floating Button -->
        <!-- BEGIN :: Expand Section -->
        {{-- <ul>
                <li>
                    <ion-icon name="logo-twitter"></ion-icon>
                    test1
                </li>
                <li>
                    <ion-icon name="logo-facebook"></ion-icon>
                    test2
                </li>
                <li>
                    <ion-icon name="logo-whatsapp"></ion-icon>
                    test3
                </li>
            </ul> --}}
        <!-- END :: Expand Section -->
    </div>
    {{-- </div> --}}
</div>

<script>
    const loading = document.getElementById('loading')
    const infoWeather = document.getElementById('infoWeather')
    const errorWeather = document.getElementById('errorWeather')

    document.addEventListener('DOMContentLoaded', function() {
        loading.style.display = "block";
        initWeather();
    })

    async function initWeather() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success => {
                fetch(
                        `https://api.openweathermap.org/data/2.5/onecall?lat=${success.coords.latitude}&lon=${success.coords.longitude}&exclude=hourly,minutely&units=metric&appid={{ env('OPEN_WEATHER_API_KEY') }}`)
                    .then(res => {
                        if (res.status == 200) {
                            return res.json()
                        }
                        errorWeather.innerHTML = "Weather service temporarily down . . ."
                        loading.style.display = "none";
                        errorWeather.style.display = "block"
                    })
                    .then(data => {
                        const img = document.getElementById("imgWeather")
                        const temp = document.getElementById("tempWeather")
                        img.setAttribute("src",
                            `http://openweathermap.org/img/wn/${data.current.weather[0].icon}@4x.png`
                            );
                        temp.innerHTML = Math.round(data.current.temp)
                        loading.style.display = "none";
                        infoWeather.style.display = "block"
                    })
                    .catch(e => {
                        errorWeather.innerHTML = "Something went wrong . . ."
                        loading.style.display = "none";
                        errorWeather.style.display = "block"
                    })
            }, err => {
                errorWeather.innerHTML = "Location service seems off . . ."
                loading.style.display = "none";
                errorWeather.style.display = "block"
            })
        } else {
            errorWeather.innerHTML = "Geolocation is not supported in this browser . . ."
            loading.style.display = "none";
            errorWeather.style.display = "block"
        }
    }
</script>
