<main class="container-fluid">  
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Administrator Login</h4>
                </div>
                <input type="hidden" id="base_url"  value="<?=base_url() ?>">
                <div class="card-body">
                    <form  id="myform" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                              Please enter a valid email.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">tel:{03x xx xxx xx}</label>
                            <input type="tel" class="form-control" id="tel" name="tel" required>
                            <div class="invalid-feedback">
                              Please enter a valid number of tel.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                            <div class="invalid-feedback">
                                Please enter a valid password
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>
                 <!-- after verification--->
                 <form id="myFormSubmit" action="<?= base_url('AdministratorController/accessHomePage') ?>" method="POST">
                    <input type="hidden" name="email" id="emailSubmit" value="">
                    <input type="hidden" name="phone" id="phoneSubmit" value="">
                    <input type="hidden" name="password" id="passwordSubmit" value="">
                 </form>

                </div>
            </div>
        </div>
    </div>
</div>
</main>