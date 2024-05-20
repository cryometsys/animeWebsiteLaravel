<x-layout>

    <section class="anime-body">
        <div class="anime-container grid">
            <div class="animeImage">
                <img src="/storage/animeCover/{{$anime->animeCover}}" alt="soloLevelingPoster" class="anime-image" srcset="">
            </div>
            <div class="animeIntro">
                <h1 class="animeTitle">{{$anime->title}}</h1>
                <p class="animeSynopsis">{{$anime->synopsis}}</p>
            </div>
            <div class="listDropdown">
                <button>Add to list</button>
                <ul class="listOptions">
                    <li><a href="#"> Plan to watch</a></li>
                    <li><a href="#">Watching</a></li>
                    <li><a href="#">Completed</a></li>
                    <li><a href="#">Dropped</a></li>
                </ul>
            </div>
            <div class="animeDetails">
                <p class="animeGenre">Genre: Action | Adventure | Fantasy</p>
                <p class="animeFormat">Format: TV</p>
                <p class="animeStatus">Status: {{$anime->status}}</p>
                <p class="animeEpisode">Episode Count: {{$anime->episodes}}</p>
                <p class="animeDuration">Duration: {{$anime->animeDuration}} minutes</p>
                <p class="animeSeason">Season: {{$anime->airing_season}} {{$anime->airing_year}}</p>
                <p class="animeAiring">Airing Date: {{$anime->airing_date}}</p>
                <p class="animeEnding">Ending Date: {{$anime->ending_date}}</p>
                <p class="animeStudio">Studios: {{$anime->studio}}</p>
            </div>
            
            <!--
                TODO: add channel logos and hover animation
            -->
            <div class="animeChannels">
                <ul class="animeChannel column1">
                    <a href="#"><li>Netflix</li></a>
                    <a href="#"><li>Hidive</li></a>
                    <a href="#"><li>Crunchyroll</li></a>
                  </ul>
                  <ul class="animeChannel column2">
                    <a href="#"><li>Funimation</li></a>
                    <a href="#"><li>Aniwave</li></a>
                    <a href="#"><li>Hulu</li></a>
                  </ul>
            </div>
            <div class="animeRating">
                <p>#3 Highest Rated {{$anime->airing_season}} {{$anime->airing_year}}</p>
            </div>
            <div class="animePopular">
                <p>#1 Most Popular {{$anime->airing_season}} {{$anime->airing_year}}</p>
            </div>
            <div class="animeEpisodeCount hidden">
                <p>Episodes Watched: </p>
            </div>
            <div class="animeScore hidden">
                <p>Your Score: </p>
            </div>
            <div class="animeRecommendations">
                <h3>Recommendations</h3>
                <ul class="recommendationList">
                  <li>
                    <a href="#">
                        <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx21087-2OkAdgfnQown.jpg" class="recommendationImg" alt="recommendation1" />
                        <p>One Punch Man</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                        <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx151970-ld9HtIKiv7xo.jpg" class="recommendationImg" alt="recommendation2" />
                        <p>Shangri-La Frontier</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                        <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx101922-WBsBl0ClmgYL.jpg" class="recommendationImg" alt="recommendation3" />
                        <p>Demon Slayer: Kimetsu No Yaiba</p>
                    </a>    
                  </li>
                  <li>
                    <a href="#">
                        <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx16498-73IhOXpJZiMF.jpg" class="recommendationImg" alt="recommendation4" />
                        <p>Attack On Titan</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                        <img src="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx127230-NuHM32a3VJsb.png" class="recommendationImg" alt="recommendation5" />
                        <p>Chainsaw Man</p>
                    </a>
                  </li>
                </ul>
            </div>
            
        </div>
    </section>

</x-layout>