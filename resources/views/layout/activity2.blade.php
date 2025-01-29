<!-- FERRER, JAVEZ ISAQ B. -->
<!-- BSIT-TG 3-1 -->
<!-- WEBDEVELOPMENT ACTIVITY 2 -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>A Web Page</title>
        @vite(['resources/sass/app.scss','resources/js/app.js'])
    </head>

    <body>
        <div class="container">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg" style="background: linear-gradient(to top, #c471f5 0%, #fa71cd 100%);">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Brand</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav offset-md-9">
                        <a class="nav-link active" aria-current="page" href="#">Features</a>
                        <a class="nav-link" href="#">Enterprise</a>
                        <a class="nav-link" href="#">Support</a>
                        <a class="nav-link" href="#">Pricing</a>
                    </div>
                </div>
            </div>
            </nav>

            <!-- login/Btn/Forms -->
            <div class="row">
                <div class = "col-lg-4 " >
                    <div class = "container border mt-3 solid">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="juandelacruz@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="********">
                        </div>
                        <div class="offset-md-5 mb-3">
                            <button type="button" style="background: linear-gradient(to top, #c471f5 0%, #fa71cd 100%);" class="btn btn-primary">Login</button>
                            <a href="#" class="ms-3">Forgot password?</a>
                        </div>
                    </div>
                
           </div>

           <!-- Pricing -->
            <div class ="col-lg-8">
                <div>
                    <center>
                        <h1>Pricing</h1>
                        <h6>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                        in culpa qui officia deserunt mollit anim id est laborum."</h6>
                    </center>
            </div> 

                <!-- Grids -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{URL('images/error404.png')}}" class="img-thumbnail">
                    </div>
                    <div class="col-lg-4">
                        <img src="{{URL('images/error404.png')}}" class="img-thumbnail">
                    </div>
                    <div class="col-lg-4">
                        <img src="{{URL('images/error404.png')}}" class="img-thumbnail">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4">
                        <img src="{{URL('images/error404.png')}}" class="img-thumbnail">
                        </div>
                    <div class="col-lg-4">
                        <img src="{{URL('images/error404.png')}}" class="img-thumbnail">
                    </div>
                    <div class="col-lg-4">  
                        <img src="{{URL('images/error404.png')}}" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="row">
                <center><h5><br>Compare Plans</h5></center>
                <table class="table" style="border-spacing: 10px;">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Free Pro</th>
                            <th scope="col">Enterprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <th scope="row">Public</th>
                            <td>✓ ✓</td>
                            <td>✓</td>
                        </tr>
                        <tr> 
                            <th scope="row">Private</th>
                            <td>✓ ✓</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Permissions</th>
                            <td>✓</td>
                            <td colspan="2">✓</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>
