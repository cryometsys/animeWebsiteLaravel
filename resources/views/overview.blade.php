<x-layout>

    <div class="profileHeader">
        <div class="profileCoverPhoto">
            <img src="https://wallpapercave.com/wp/wp12947983.jpg" alt="profileCover" class="profileCover">
            
        </div>
        <div id="grad1"></div>
        <div class="profileSection">
            <img src="https://i.pinimg.com/736x/ae/a7/a9/aea7a9551cda1f88cc5e6e7ea52709f1.jpg" alt="Profile Picture" class="profileImage">
            <p class="profileName">{{auth()->user()->username}}</p>
        </div>
    </div>

    <section class="profileLinks">
        <ul>
            <a href="#" class="active"><li>Overview</li></a>
            <a href="anime_list.html"><li>Anime List</li></a>
            <a href="favorites.html"><li>Favorites</li></a>
        </ul>
    </section>
    
    <div id="profileContent">
      <div class="anime-stats">
        <div class="overview">
          <h2>Overview</h2>
          <div class="stat-box">
            <p>Total Anime</p>
            <span id="total-anime">25</span>
          </div>
          <div class="stat-box">
            <p>Episodes Watched</p>
            <span id="episodes-watched">240</span>
          </div>
          <div class="stat-box">
            <p>Days Watched</p>
            <span id="days-watched">3.7</span>
          </div>
          <div class="stat-box">
            <p>Mean Score</p>
            <span id="mean-score">7.3</span>
          </div>
        </div>
    
        <div class="genres">
          <h2>Genres Watched</h2>
          <div class="genre-summary">
            <h3 class="genreSummaryName">Action</h3>
            <h3 class="genreCountValue">10</h3>
            <hr/>
            <ul class="summary-list">
              <li>One Punch Man<span>10.0</span></li>
              <li>My Hero Academia<span>10.0</span></li>
              <li>Rurouni Kenshin<span>10.0</span></li>
            </ul>
          </div>
          <div class="genre-summary">
            <h3 class="genreSummaryName">Comedy</h3>
            <h3 class="genreCountValue">9</h3>
            <hr/>
            <ul class="summary-list">
              <li>Gintama<span>10.0</span></li>
              <li>One Punch Man<span>10.0</span></li>  
              <li>One Punch Man<span>10.0</span></li>  
            </ul>
          </div>
          <div class="genre-summary">
            <h3 class="genreSummaryName">Horror</h3>
            <h3 class="genreCountValue">19</h3>
            <hr/>
            <ul class="summary-list">
              <li>Another<span>10.0</span></li>
              <li>Mononoke<span>10.0</span></li>
              <li>Vampire Hunter D<span>10.0</span></li>
            </ul>
          </div>
          <div class="genre-summary">
            <h3 class="genreSummaryName">Sci-Fi</h3>
            <h3 class="genreCountValue">8</h3>
            <hr/>
            <ul class="summary-list">
              <li>Cowboy Bebop<span>10.0</span></li>
              <li>Gurenn Lagann<span>8.5</span></li>
              <li>Nier Automata: D<span>6.0</span></li>
            </ul>
          </div>
          <div class="genre-summary">
            <h3 class="genreSummaryName">Romance</h3>
            <h3 class="genreCountValue">2</h3>
            <hr/>
            <ul class="summary-list">
              <li>Rurouni Kenshin<span>10.0</span></li>
              <li>Vampire Hunter D: Bloodlust<span>10.0</span></li>
              <li>Your Name<span>10.0</span></li>
            </ul>
          </div>
          <div class="genre-summary">
            <h3 class="genreSummaryName">Sci-Fi</h3>
            <h3 class="genreCountValue">10</h3>
            <hr/>
            <ul class="summary-list">
              <li>Cowboy Bebop<span>10.0</span></li>
              <li>Gurenn Lagann<span>10.0</span></li>
              <li>Nier Automata: D<span>10.0</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

</x-layout>