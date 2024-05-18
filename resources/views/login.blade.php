<x-layout>

    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0 justify-content-center">
                <h1 class="fw-bold mb-0 fs-2">WELCOME BACK</h1>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form action="/overview" method="POST" class="" data-bitwarden-watching="1">
                        @csrf
                        <div class="form-floating mb-3">
                        <input type="email" name="loginUserMail" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="password" name="loginUserPassword" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Login</button>
                        <hr/>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>