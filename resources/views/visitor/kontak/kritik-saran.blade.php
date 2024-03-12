@extends('visitor.layout.main')

@section('title', 'Kontak')

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
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Kritik & Saran</h1>
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
                        <label class="form-label visually-hidden" for="message">Pesan</label>
                        <textarea class="form-control form-livedoc-control" id="message" name="message" style="font-style:italic"
                            maxlength="100" placeholder="Pesan Maksimum 100 karakter" style="height: 250px"></textarea>
                        <span id="messageError" class="error"></span>
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                            <button id="sendSuggestionButton" class="btn btn-primary rounded-pill" type="button"
                                onclick="sendSuggestion()">Kirim</button>
                        </div>
                    </div>

                    <span id="suggestionError" class="error"></span>
                    <span id="suggestionSuccess" class="success"></span>
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

        function sendSuggestion() {
            $("#nameError").hide();
            $("#emailError").hide();
            $("#phoneNumberError").hide();
            $("#messageError").hide();
            $("#suggestionError").hide();
            $("#suggestionSuccess").hide();

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
            } else if ($("#message").val() === "") {
                $("#messageError").show();
                $("#messageError").text("Pesan tidak boleh kosong");
            } else {
                $("#name").prop("disabled", true);
                $("#email").prop("disabled", true);
                $("#phone_number").prop("disabled", true);
                $("#message").prop("disabled", true);
                document.getElementById("sendSuggestionButton").disabled = true;
                $.ajax({
                    type: 'POST',
                    url: '/kritik-saran',
                    data: {
                        name: $("#name").val(),
                        email: $("#email").val(),
                        phone_number: $("#phone_number").val(),
                        message: $("#message").val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            $("#suggestionSuccess").show();
                            $("#suggestionSuccess").text(response.success);
                        }
                    },
                    error: function(xhr, status, error) {
                        $("#suggestionError").show();
                        $("#suggestionError").text(error);
                        $("#name").prop("disabled", false);
                        $("#email").prop("disabled", false);
                        $("#phone_number").prop("disabled", false);
                        $("#message").prop("disabled", false);
                        document.getElementById("sendSuggestionButton").disabled = false;
                    }
                });
            }
        }
    </script>
@endsection
