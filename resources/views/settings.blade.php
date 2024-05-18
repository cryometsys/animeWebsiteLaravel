<x-layout>

    <div class="settingsSection">
        <h1>Hello, {{auth()->user()->username}}</h1>
        <h4>{{auth()->user()->email}}</h4>
        <section class="user-settings">
          <h2>User Settings</h2>
          <div class="setting">
            <label for="username">Username:</label>
            <input type="text" id="username" value={{auth()->user()->username}}>
            <button id="changeButton">Change Username</button>
          </div>
          <div class="setting">
            <label for="email">Current Email:</label>
            <input type="mail" id="email" value={{auth()->user()->email}}>
            <button id="changeButton">Change Username</button>
          </div>
          <div class="setting">
            <label for="current-password">Current Password:</label>
            <input type="password" id="current-password">
          </div>
          <div class="setting">
            <label for="new-password">New Password:</label>
            <input type="password" id="new-password">
            <button id="changeButton">Change Password</button>
          </div>
          <div class="privacy-settings">
            <h2>Privacy Settings</h2>
            <div class="radio-options">
              <input type="radio" id="private" name="privacy" value="private">
              <label for="private">Private</label>
              <p>Your profile is visible, but only you can see your activity.</p>
              <input type="radio" id="public" name="privacy" value="public">
              <label for="public">Public</label>
              <p>Everyone can see your activity.</p>
            </div>
          </div>
          <div class="photo-uploads">
            <h2>Avatar</h2>
            <h3></h3>
            <div class="photo-upload">
              <div class="current-photo">
                <img src="https://i.pinimg.com/736x/ae/a7/a9/aea7a9551cda1f88cc5e6e7ea52709f1.jpg" alt="Current Profile Picture">
              </div>
              <div class="upload-option">
                <label for="profile-picture">
                  <span class="upload-box">
                    <p>Upload New Image</p>
                    <p>or Drag Photo Here</p>
                  </span>
                </label>
                <input type="file" id="profile-picture">
              </div>
            </div>
            <h2>Cover Photo</h2>
            <div class="photo-upload">
              <div class="current-cover">
                <img src="https://wallpapercave.com/wp/wp12947983.jpg" alt="Current Cover Photo">
              </div>
              <div class="upload-option">
                <label for="cover-photo">
                  <span class="upload-box">
                    <p>Upload New Image</p>
                    <p>or Drag Photo Here</p>
                  </span>
                </label>
                <input type="file" id="cover-photo">
              </div>
            </div>
          </div>
          <form action="/logout" method="POST" class="settingsButton">
            @csrf
            <button class="logoutBtn">Log Out</button>
            <button class="deleteBtn">Delete Account</button>
          </form>
          
        </section>         
      </div>

    </x-layout>