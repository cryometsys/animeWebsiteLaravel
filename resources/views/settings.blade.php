<x-layout>

    <div class="settingsSection">
        <h1>Hello, {{auth()->user()->username}}</h1>
        <h4>{{auth()->user()->email}}</h4>
        <section class="user-settings">
          <h2>User Settings</h2>
          <div class="setting">
            <form action="{{ route('update-username') }}" method="POST">
              @csrf
              <label for="username">Username:</label>
              <input type="text" id="username" value={{auth()->user()->username}} name="username">
              <button id="changeButton" type="submit">Change Username</button>
            </form>
          </div>
          <div class="setting">
            <form action="{{route('update-email')}}" method="POST">
              @csrf
              <label for="email">Current Email:</label>
              <input type="mail" id="email" value={{auth()->user()->email}} name="email">
              <button id="changeButton">Change Username</button>
            </form>
          </div>
          <form action="{{ route('update-password') }}" method="POST">
            @csrf
          <div class="setting">
            <label for="current-password">Current Password:</label>
            <input type="password" id="current-password" name="current_password">
          </div>
          <div class="setting">
              <label for="new-password">New Password:</label>
              <input type="password" id="new-password" name="new_password">
              <button id="changeButton">Change Password</button>
            </div>
          </form>

          <div class="photo-uploads">
            <h2>Avatar</h2>
            <h3></h3>
            <div class="photo-upload">
              <div class="current-photo">
                <img src="{{auth()->user()->profilePhoto}}" alt="Current Profile Picture">
              </div>
              <div class="upload-option">
                <label for="profile-picture">
                  <span class="upload-box">
                    <p>Upload New Image</p>
                    <p>or Drag Photo Here</p>
                  </span>
                </label>
                <form action="/manage-photo" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" id="profile-picture" name="profilePhoto">
                  @error('profilePhoto')
                      <p class="alert small alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                  <button class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
            <h2>Cover Photo</h2>
            <div class="photo-upload">
              <div class="current-cover">
                <img src="{{auth()->user()->profileCover}}" alt="Current Cover Photo">
              </div>
              <div class="upload-option">
                <label for="cover-photo">
                  <span class="upload-box">
                    <p>Upload New Image</p>
                    <p>or Drag Photo Here</p>
                  </span>
                </label>
                <form action="/manage-cover" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" id="cover-photo" name="profileCover">
                  <button class="btn btn-primary">Save</button>
                </form>
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