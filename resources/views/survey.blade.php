<!DOCTYPE html>
<html lang="en">
<head>
    <title>Survey</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.icon') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/noui/nouislider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body>

<section>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form">
                @csrf
                <span class="contact100-form-title">
                PFT Feedback
            </span>

                <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                    <span class="label-input100">FULL NAME *</span>
                    <input class="input100" type="text" name="name" placeholder="Enter Your Name" required>
                </div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
                    <span class="label-input100">Email *</span>
                    <input class="input100" type="text" name="email" placeholder="Enter Your Email " required>
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Phone</span>
                    <input class="input100" type="text" name="telephone" placeholder="Enter Number Phone" required>
                </div>

                <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Feedback">
                    <span class="label-input100">Feedback</span>
                    <textarea class="input100" name="feedback" placeholder="Your feedback here..."></textarea>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" type="button" id="submit-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<div id="alert-container"></div>


<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
<script src="{{ asset('vendor/noui/nouislider.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script>
    $('#submit-btn').on('click', () => {
        $.ajax({
            url: '/survey',
            method: 'post',
            data: {
                _token: $('[name="_token"]').val(),
                name: $('[name="name"]').val(),
                email: $('[name="email"]').val(),
                telephone: $('[name="telephone"]').val(),
                feedback: $('[name="feedback"]').val(),
            },
            success: data => {
                if (data.type) {
                    $('#alert-container').append(`
                        <div class="alert alert-danger alert-dismissible fade show flash-message" role="alert">
                            ${data.message}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`
                    );
                } else {
                    $('section').html(`
                        <div class="container-contact100">
                            <div class="wrap-contact100 text-center">
                                <h1 class="mb-5">Thank you for your feedback</h1>
                                <p>You will now be redirected</p>
                            </div>
                        </div>`
                    );
                    setTimeout(() => window.location.href = '/database', 4000);
                }
            }
        })
    })
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
