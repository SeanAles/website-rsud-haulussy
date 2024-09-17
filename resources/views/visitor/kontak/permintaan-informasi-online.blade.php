@extends('visitor.layout.main')

@section('title', 'Permintaan Informasi Online')

@section('style')
    <style>
        .error {
            color: red;
            margin-left: 17px;
            font-size: 15px;
            display: none;
        }

        .success {
            color: green;
            margin-left: 17px;
            font-size: 15px;
            display: none;
        }

        .text-stretch {
            letter-spacing: 0.15em;
            /* adjust the value to stretch text more or less */
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Permintaan Informasi Online</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="bg-holder bg-size"
                style="background-image: url(/visitor/assets/img/gallery/dot-bg.png); background-position: bottom right; background-size: auto">
            </div>

            <div class="col-lg-6 z-index-2 mb-5"><img class="w-100 rounded"
                    src="{{ asset('visitor/assets/img/gallery/info.jpg') }}" alt="..." />
            </div>

            <div class="col-lg-6 z-index-2">
                <form class="row g-3" id="formKritikSaran">
                    @csrf
                    <div class="col-md-12">
                        <label class="visually-hidden" for="name">Nama</label>
                        <input class="form-control form-livedoc-control" id="name" name="name" type="text"
                            placeholder="Nama" />
                        <span id="nameError" class="error"></span>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label visually-hidden" for="email">Email</label>
                        <input class="form-control form-livedoc-control" id="email" name="email" type="email"
                            placeholder="Email" />
                        <span id="emailError" class="error"></span>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label visually-hidden" for="phone_number">No Handphone</label>
                        <input class="form-control form-livedoc-control" id="phone_number" name="phone_number"
                            type="text" placeholder="No Handphone" />
                        <span id="phoneNumberError" class="error"></span>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label visually-hidden" for="information">Informasi Online yang Dimintakan</label>
                        <textarea class="form-control form-livedoc-control" id="information" name="information" style=""
                            maxlength="300" placeholder="Permintaan Informasi Online" style="height: 250px"></textarea>
                        <span id="informationError" class="error"></span>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label visually-hidden" for="reason">Maksud Permintaan Informasi Online</label>
                        <textarea class="form-control form-livedoc-control" id="reason" name="reason" style=""
                            maxlength="300" placeholder="Maksud Permintaan Informasi Online" style="height: 250px"></textarea>
                        <span id="reasonError" class="error"></span>
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                            <button id="sendRequestButton" class="btn btn-primary rounded-pill" type="button"
                                onclick="sendRequest()">Kirim Permintaan</button>
                        </div>
                    </div>

                    <span id="requestError" class="error"></span>
                    <span id="reasonSuccess" class="success"></span>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailRegex.test(email)) {
                return false;
            } else {
                return true;
            }
        }

        function validatePhoneNumber(phoneNumber) {
            var phoneRegex = /^(\+62|0)(\d{9,11})$/;
            if (phoneRegex.test(phoneNumber)) {
                return false;
            } else {
                return true;
            }
        }

        function sendRequest() {
            $("#nameError").hide();
            $("#emailError").hide();
            $("#phoneNumberError").hide();
            $("#informationError").hide();
            $("#reasonError").hide();

            $("#requestError").hide();
            $("#requestSuccess").hide();

            $(".error").text("");
            if ($("#name").val() === "") {
                $("#nameError").show();
                $("#nameError").text("Name tidak boleh kosong");
            } else if ($("#name").val().length > 50) {
                $("#nameError").show();
                $("#nameError").text("Name tidak boleh lebih dari 50 karakter");
            } else if ($("#email").val() === "") {
                $("#emailError").show();
                $("#emailError").text("Email tidak boleh kosong");
            } else if (validateEmail($("#email").val())) {
                $("#emailError").show();
                $("#emailError").text("Format email salah");
            } else if ($("#phone_number").val() === "") {
                $("#phoneNumberError").show();
                $("#phoneNumberError").text("Nomor HP tidak boleh kosong");
            } else if (validatePhoneNumber($("#phone_number").val())) {
                $("#phoneNumberError").show();
                $("#phoneNumberError").text("Format nomor HP salah");
            } else if ($("#information").val() === "") {
                $("#informationError").show();
                $("#informationError").text("Permintaan informasi online yang dimintakan tidak boleh kosong");
            } else if ($("#reason").val() === "") {
                $("#reasonError").show();
                $("#reasonError").text("Maksud permintaan informasi online tidak boleh kosong");
            } else {
                $("#name").prop("disabled", true);
                $("#email").prop("disabled", true);
                $("#phone_number").prop("disabled", true);
                $("#information").prop("disabled", true);
                $("#reason").prop("disabled", true);
                document.getElementById("sendRequestButton").disabled = true;
                $.ajax({
                    type: 'POST',
                    url: '/permintaan-informasi-online',
                    data: {
                        name: $("#name").val(),
                        email: $("#email").val(),
                        phone_number: $("#phone_number").val(),
                        information: $("#information").val(),
                        reason: $("#reason").val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            $("#reasonSuccess").show();
                            $("#reasonSuccess").text(response.success);
                        }
                    },
                    error: function(xhr, status, error) {
                        $("#requestError").show();
                        $("#requestError").text(error);
                        
                        $("#name").prop("disabled", false);
                        $("#email").prop("disabled", false);
                        $("#phone_number").prop("disabled", false);
                        $("#information").prop("disabled", false);
                        $("#reason").prop("disabled", false);
                        document.getElementById("sendRequestButton").disabled = false;
                    }
                });
            }
        }
    </script>
@endsection
