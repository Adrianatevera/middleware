<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="login/style.css"/>
    <style>
      .carousel .images-wrapper .image {
  width: 100%; /* Ajusta el ancho a tu gusto */
  height: 600px; /* Mantiene la proporción de la imagen */
  max-width: 500px; /* Establece un ancho máximo si lo deseas */
}
    </style> 
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">

            <form action="validar.php" autocomplete="on" method="POST" class="sign-in-form">
              <div class="logo">
                <img src="login/img/veterinaria.jpeg" alt="easyclass" />
                <h3>Alfa veterinaria</h3>
              </div>

              <div class="heading">
                <h2>Bienvenido</h2><br>
                <h4>Inicio de Sesión</h4>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email"
                    minlength="4"
                    class="input-field"
                    autocomplete="on"
                    required name="username"
                    placeholder="Correo"
                  />
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required name="password"
                    placeholder="Contraseña"
                  />
                </div>

                <input type="submit" value="Ingresar" class="sign-btn" />

                <p class="text">
                  Recuerda No Perder Tu Contraseña
                </p>
              </div>
            </form>

            <form action="index.html" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="login/img/logo.png" alt="easyclass" />
                <h4>easyclass</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
  <div class="images-wrapper">
    <img src="login/img/veterin.webp" class="image img-1 show" alt="" />
  </div>
</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
  </body>
</html>
