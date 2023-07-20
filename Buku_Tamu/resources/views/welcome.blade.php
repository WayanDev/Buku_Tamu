<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lugrasimo&display=swap" rel="stylesheet">

    <title>Buku Tamu</title>
</head>
<body>
    @include('sweetalert::alert')
    <form action="{{ route('buku_tamu.submit') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    {{ csrf_field() }}
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="card card0 border-0">
                <div class="row d-flex">
                    <div class="col-lg-6">
                        <div class="card1 pb-5">
                            <div class="row px-3 justify-content-center mt-4 mb-3 border-line" >
                                <div id="my_camera" style="background-color:#1A237E"></div>
                            </div>
                            <div class="row px-3 justify-content-center mt-4 mb-3 border-line" >
                                <div id="error-message" style="color: red;"></div>
                            </div>
                            <div class="row px-3 justify-content-center mt-3 mb-3 border-line">
                                <button type="button" class="btn btn-primary" onClick="take_snapshot()"><i class="bi bi-camera" style="font-size: 1.5rem;"></i></button>
                                <input type="hidden" name="image" class="image-tag">
                            </div>
                            <div class="row px-3 justify-content-center mt-3 mb-3 border-line">
                                <div id="results">Gambar yang Anda ambil akan muncul di sini...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row mb-4 px-3">
                                <h1 class="mb-0 mr-4 mt-2 text-center" style="width: 100%;">Buku Tamu</h1>
                            </div>
                            <div class="row px-3 mb-4">
                                <div class="line"></div>
                                <small class="or text-center">Selamat Datang</small>
                                <div class="line"></div>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Nama</h6></label>
                                <input class="mb-1" type="text" name="nama" placeholder="Masukkan nama lengkap Anda" value="{{ old('nama') }}">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label><h6 class="mb-0 text-sm" style="padding-top: 5px">Jenis Kelamin</h6></label>
                                <div class="col-8 mb-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input name="jenis_kelamin" id="radio_0" type="radio" class="custom-control-input" 
                                        value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}> 
                                        <label for="radio_0" class="custom-control-label text-sm">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input name="jenis_kelamin" id="radio_1" type="radio" class="custom-control-input" 
                                        value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}> 
                                        <label for="radio_1" class="custom-control-label text-sm">Perempuan</label>
                                    </div>
                                </div>
                                @error('jenis_kelamin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Alamat/Instansi</h6></label>
                                <input class="mb-1" type="text" name="alamat" placeholder="Masukkan Alamat/Instansi" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Kesan</h6></label>
                                <input class="mb-1" type="text" name="kesan" placeholder="Masukkan Kesan Selama Acara Berlangsung" value="{{ old('kesan') }}">
                                @error('kesan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Pesan</h6></label>
                                <textarea class="mb-1" type="text" name="pesan" placeholder="Masukkan Pesan Selama Acara Berlangsung">{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3 px-3 d-flex justify-content-end">
                                <button name="submit" type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <div class="bg-blue py-4">
                    <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; <time datetime="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></time> Buku Tamu</small>
                </div>
            </div>
        </div>
    </form>
</body>
    <script language="JavaScript">
        Webcam.set({
            width: 450,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        
        Webcam.attach( '#my_camera' );
        
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
        function validateForm() {
            // Check jika gambar sudah ter capture
            var imageTagValue = $(".image-tag").val();
            if (!imageTagValue) {
                
                document.getElementById('error-message').innerHTML = "Silakan ambil gambar terlebih dahulu sebelum mengirim!";
                return false;
            }
            
            document.getElementById('error-message').innerHTML = "";
            return true;
        }
    </script>
</html>