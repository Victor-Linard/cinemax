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
                                  Sign Up
                              </h2>

                              <!-- Text -->
                              <p class="mb-6 text-center text-muted">
                                  Simplify your workflow in minutes.
                              </p>

                              <!-- Form -->
                              <form method="post" action="./PHPScripts/createAccount.php" class="mb-6">
                                <div class="row g-3">
                                  <div class="col-12 col-md-6 mb-3">
                                    <input name="firstName" type="text" class="form-control" placeholder="First name" required="">
                                  </div>
                                  <div class="col-12 col-md-6 mb-3">
                                    <input name="lastName" type="text" class="form-control" placeholder="Last name" required="">
                                  </div>
                                </div>
                                  <!-- Email -->
                                  <div class="form-group">
                                      <label class="visually-hidden" for="modalSignupHorizontalEmail">
                                          Your email
                                      </label>
                                      <input name="email" type="email" class="form-control" id="modalSignupHorizontalEmail"
                                             placeholder="Your email">
                                  </div>

                                  <!-- Password -->
                                  <div class="form-group mb-5">
                                      <label class="visually-hidden" for="modalSignupHorizontalPassword">
                                          Create a password
                                      </label>
                                      <input name="password" type="password" class="form-control" id="modalSignupHorizontalPassword"
                                             placeholder="Create a password">
                                  </div>

                                  <!-- Submit -->
                                  <button name="submitSignUp" class="btn w-100 btn-primary" type="submit">
                                      Sign up
                                  </button>

                              </form>

                              <!-- Text -->
                              <p class="mb-0 fs-sm text-center text-muted">
                                  Already have an account? <a class="dropdown-item" data-bs-toggle="modal" href="#modalSigninHorizontal">Sign in</a>
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
                                  Sign In
                              </h2>

                              <!-- Text -->
                              <p class="mb-6 text-center text-muted">
                                  Simplify your workflow in minutes.
                              </p>

                              <!-- Form -->
                              <form method="post" action="index.php" class="mb-6">

                                  <!-- Email -->
                                  <div class="form-group">
                                      <label class="visually-hidden" for="modalSigninHorizontalEmail">
                                          Your email
                                      </label>
                                      <input name="email" type="email" class="form-control" id="modalSigninHorizontalEmail"
                                             placeholder="Your email">
                                  </div>

                                  <!-- Password -->
                                  <div class="form-group mb-5">
                                      <label class="visually-hidden" for="modalSigninHorizontalPassword">
                                          Enter your password
                                      </label>
                                      <input name="password" type="password" class="form-control" id="modalSigninHorizontalPassword"
                                             placeholder="Enter your password">
                                  </div>
                                  
                                  <div class="form-group mb-5">
                                  <div class="form-check form-switch">
                                      <input name="administrateur" type="checkbox" class="form-check-input" id="customSwitch2">
                                      <label class="form-check-label" for="customSwitch2">Administrateur</label>
                                  </div>
                                  </div>

                                  <!-- Submit -->
                                  <button name="submitSignIn" class="btn w-100 btn-primary" type="submit">
                                      Sign in
                                  </button>

                              </form>

                              <!-- Text -->
                              <p class="mb-0 fs-sm text-center text-muted">
                                  Already have an account? <a class="dropdown-item" data-bs-toggle="modal" href="#modalSignupHorizontal">Sign up</a>
                              </p>

                          </div>
                      </div>

                  </div> <!-- / .row -->
              </div>
          </div>
      </div>
  </div>';
}