<?php
function getSignModal() {
    return ' <!-- MODALS -->
  <!-- Signup: Horizontal  -->
  <div class="modal fade" id="modalSignupHorizontal" tabindex="-1" role="dialog"
       aria-labelledby="modalSignupHorizontalTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="card card-row">
                  <div class="row gx-0">
                      <div class="col-12 col-md-12">
                          <div class="card-body">

                              <!-- Close -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                              <!-- Heading -->
                              <h2 class="mb-0 fw-bold text-center" id="modalSignupHorizontalTitle">
                                  Créer un compte
                              </h2>

                              <!-- Form -->
                              <form method="post" action="./PHPScripts/createAccount.php" class="mb-6">
                                <div class="row g-3">
                                  <div class="col-12 col-md-6 mb-3">
                                    <input name="firstName" type="text" class="form-control" placeholder="Prénom" required="">
                                  </div>
                                  <div class="col-12 col-md-6 mb-3">
                                    <input name="lastName" type="text" class="form-control" placeholder="Nom" required="">
                                  </div>
                                </div>
                                  <!-- Email -->
                                  <div class="form-group">
                                      <label class="visually-hidden" for="modalSignupHorizontalEmail">
                                          Email
                                      </label>
                                      <input name="email" type="email" class="form-control" id="modalSignupHorizontalEmail"
                                             placeholder="Email">
                                  </div>

                                  <!-- Password -->
                                  <div class="form-group mb-5">
                                      <label class="visually-hidden" for="modalSignupHorizontalPassword">
                                           Mot de passe
                                      </label>
                                      <input name="password" type="password" class="form-control" id="modalSignupHorizontalPassword"
                                             placeholder="Mot de passe">
                                  </div>

                                  <!-- Submit -->
                                  <button name="submitSignUp" class="btn w-100 btn-primary" type="submit">
                                      Inscription
                                  </button>

                              </form>

                              <!-- Text -->
                              <p class="mb-0 fs-sm text-center text-muted">
                                  Vous avez déjà un compte ? <a class="dropdown-item" data-bs-toggle="modal" href="#modalSigninHorizontal">Connectez-vous</a>
                              </p>

                          </div>
                      </div>

                  </div> <!-- / .row -->
              </div>
          </div>
      </div>
  </div>


  <!-- Signin: Horizontal  -->
  <div class="modal fade" id="modalSigninHorizontal" tabindex="-1" role="dialog"
       aria-labelledby="modalSigninHorizontalTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="card card-row">
                  <div class="row gx-0">
                      <div class="col-12 col-md-12">
                          <div class="card-body">

                              <!-- Close -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                              <!-- Heading -->
                              <h2 class="mb-0 fw-bold text-center" id="modalSigninHorizontalTitle">
                                  Connexion
                              </h2>

                              <!-- Form -->
                              <form method="post" action="index.php" class="mb-6">

                                  <!-- Email -->
                                  <div class="form-group">
                                      <label class="visually-hidden" for="modalSigninHorizontalEmail">
                                          Email
                                      </label>
                                      <input name="email" type="email" class="form-control" id="modalSigninHorizontalEmail"
                                             placeholder="Votre email">
                                  </div>

                                  <!-- Password -->
                                  <div class="form-group mb-5">
                                      <label class="visually-hidden" for="modalSigninHorizontalPassword">
                                          Mot de passe
                                      </label>
                                      <input name="password" type="password" class="form-control" id="modalSigninHorizontalPassword"
                                             placeholder="Votre mot de passe">
                                  </div>
                                  
                                  <div class="form-group mb-5">
                                  <div class="form-check form-switch">
                                      <input name="administrateur" type="checkbox" class="form-check-input" id="customSwitch2">
                                      <label class="form-check-label" for="customSwitch2">Administrateur</label>
                                  </div>
                                  </div>

                                  <!-- Submit -->
                                  <button name="submitSignIn" class="btn w-100 btn-primary" type="submit">
                                      Connexion
                                  </button>

                              </form>

                              <!-- Text -->
                              <p class="mb-0 fs-sm text-center text-muted">
                                  Vous n\'avez pas encore de compte ? <a class="dropdown-item" data-bs-toggle="modal" href="#modalSignupHorizontal">Inscrivez-vous</a>
                              </p>

                          </div>
                      </div>

                  </div> <!-- / .row -->
              </div>
          </div>
      </div>
  </div>';
}