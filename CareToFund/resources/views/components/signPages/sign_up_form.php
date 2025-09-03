<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <div class="bg-light shadow d-flex flex-column align-items-center justify-content-center p-5" style="border-radius: 12px; width: auto; min-width: 320px; max-width: 100%;">
        <a href="/Shanty-Dope-Proj/CareToFund/"><img src="/Shanty-Dope-Proj/CareToFund/resources/img/website_logo.png" alt="CareToFund Logo" class="img-fluid mb-2" style="width: 150px; display: block; margin: 10px auto 10px auto;"></a>
        <div class="text-center mb-3">
            <p class="fs-2 fw-bold mb-0" style="color: #1b3c53;">
                Sign Up
            </p>
            <p class="mb-4" style="color: #545454;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>

    <form action="/Shanty-Dope-Proj/CareToFund/signUpProcess" style="width: 100%; min-width: 450px;" method="POST">
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
                <p class="fs-4 fw-bold mb-0" style="color: #1b3c53;">
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
            <button type="submit" class="btn mt-5 d-block mx-auto w-75 btn_continue" style=" color: white; border-radius: 12px;">Continue</button>
        </form>
        <p class="fs-6" style="color: #545454;">
            Already Have an Account? <a href="/Shanty-Dope-Proj/CareToFund/sign_in">Sign In</a>
        </p>
    </div>
</div>