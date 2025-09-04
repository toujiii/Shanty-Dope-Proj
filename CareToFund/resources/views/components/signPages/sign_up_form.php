<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <div class="container bg-light shadow d-flex  align-items-center justify-content-center gap-4 p-5 mx-3" style="border-radius: 12px; width: auto; max-width: 100%;">
        <div class="container d-flex flex-column align-items-center" style="max-width: 1200px;">
            <form action="/Shanty-Dope-Proj/CareToFund/signUpProcess" class="text-center" style="width: 100%;" method="POST">
                <div class="d-flex align-items-center gap-5 flex-column flex-md-row">
                    <div>
                        <a href="/Shanty-Dope-Proj/CareToFund/"><img src="/Shanty-Dope-Proj/CareToFund/resources/img/website_logo.png" alt="CareToFund Logo" class="img-fluid mb-2" style="width: 150px; display: block; margin: 10px auto 10px auto;"></a>
                        <div class="text-center mb-3">
                            <p class="fs-2 fw-bold mb-0" style="color: #1b3c53;">
                                Sign Up
                            </p>
                            <p class="mb-5" style="color: #545454;">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>
                        <div class="mb-2">
                            <input type="text" placeholder="Name" class="form-control py-2" style="border-radius: 12px;" id="name" name="name" required>
                        </div>
                        <div class="mb-2">
                            <input type="email" placeholder="Email Address" class="form-control py-2" style="border-radius: 12px;" id="email" name="email" required>
                        </div>
                        <div class="mb-2">
                            <input type="password" placeholder="Password" class="form-control py-2" style="border-radius: 12px;" id="password" name="password" required minlength="6">
                        </div>
                        <div class="mb-2">
                            <input type="password" placeholder="Confirm Password" class="form-control mb-5 py-2" style="border-radius: 12px;" id="confirm_password" name="confirm_password" required minlength="6">
                        </div>
                        <div class="text-center mb-3">
                            <p class="fs-5 fw-bold mb-0" style="color: #1b3c53;">
                                Wallet Setup
                            </p>
                        </div>
                        <div class="mb-2">
                            <input type="text" placeholder="GCash Number" class="form-control py-2" style="border-radius: 12px;" id="gcash" name="gcash" value="GCash" readonly disabled>
                        </div>
                        <div class="mb-2">
                            <input type="text"
                                placeholder="GCash Number"
                                class="form-control py-2"
                                style="border-radius: 12px;"
                                id="gcash"
                                name="gcash"
                                pattern="09[0-9]{9}"
                                minlength="11"
                                maxlength="11"
                                required>
                        </div>
                    </div>
                    <div class="vr" style="height: auto;"></div>
                    <div>
                        <p class="fs-5 fw-bold mb-4" style="color: #1b3c53;">
                            Identity Verification Photos
                        </p>
                       
                    </div>
                </div>
                <button type="submit" class="btn mt-5 d-block mx-auto w-50 btn_continue" style=" color: white; border-radius: 12px;">Continue</button>
                <p class="fs-6" style="color: #545454;">
                    Already Have an Account? <a href="/Shanty-Dope-Proj/CareToFund/sign_in">Sign In</a>
                </p>
            </form>

        </div>



    </div>
</div>
