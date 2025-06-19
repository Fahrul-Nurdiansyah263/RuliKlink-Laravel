<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/backend/admin.css')}}">
    
    <title>Admin</title>
</head>
<body>
    <div class="d-flex align-items-start min-vh-100">

        <!-- Sidebar -->
        <div class="min-vh-100 sidebar d-flex flex-column">
            <div class="header-sidebar">
                <p>Admin</p>
                <p>Database</p>
            </div>
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link custom-nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <i class="bi bi-house-door-fill"></i> Home
                </button>
                <button class="nav-link custom-nav-link" id="v-pills-sampah-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sampah" type="button" role="tab" aria-controls="v-pills-sampah" aria-selected="false">
                    <i class="bi bi-trash-fill"></i> Tempat Sampah
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="tab-content flex-grow-1 h-100 right-content" id="v-pills-tabContent">

            <!-- HOME TAB -->
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                <h3 class="mt-4 mb-3"> Data Admin</h3>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="margin: 20px; margin-left:0;"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Tambah Data 
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="mb-4">Tambah Data Admin</h4>
      </div>

      <form action="{{ route('admin.store') }}" method="POST" style="gap: 4rem;">
        @csrf

        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama admin"
              class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
              <span class="invalid-feedback alert-danger d-block" role="alert">
                {{ $message }}
              </span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan Email Hewan"
              class="form-control @error('email') is-invalid @enderror" style="width: 45rem">
            @error('email')
              <span class="invalid-feedback alert-danger d-block" role="alert">
                {{ $message }}
              </span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Password</label>
            <input type="text" name="password" id="password" value="{{ old('password') }}" placeholder="Masukkan Password"
              class="form-control @error('password') is-invalid @enderror" style="width: 45rem">
            @error('password')
              <span class="invalid-feedback alert-danger d-block" role="alert">
                {{ $message }}
              </span>
            @enderror
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>

    </div>
  </div>
</div>
          

             

                <ul class="list-group">
                    <li class="list-group-item d-flex fw-bold">
                        <div class="col">No</div>
                        <div class="col">Nama</div>
                        <div class="col">Email</div>
                        <div class="col">Aksi</div>
                    </li>
                    @foreach ($admin as $row)
                        <li class="list-group-item d-flex align-items-center">
                            <div class="col">{{ $loop->iteration }}</div>
                            <div class="col">{{ $row->nama }}</div>
                            <div class="col">{{ $row->email }}</div>
                            <div class="col">
                                
                                <a href="{{ route('admin.edit', $row->id) }}" class="btn btn-sm btn-primary mx-1">Edit</a>
                                <form action="{{ route('admin.destroy', $row->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- TEMPAT SAMPAH TAB -->
            <div class="tab-pane fade" id="v-pills-sampah" role="tabpanel" aria-labelledby="v-pills-sampah-tab" tabindex="0">
                <h3 class="mt-5 mb-2"> Data Admin Yang Terhapus</h3>

                <ul class="list-group" style="margin-top: 5rem">
                    <li class="list-group-item d-flex fw-bold">
                        <div class="col">No</div>
                        <div class="col">Nama</div>
                        <div class="col">Email</div>
                        <div class="col">Aksi</div>
                    </li>
                    @foreach ($trashedAdmin as $row)
                        <li class="list-group-item d-flex align-items-center">
                            <div class="col">{{ $loop->iteration }}</div>
                            <div class="col">{{ $row->nama }}</div>
                            <div class="col">{{ $row->email }}</div>
                            <div class="col">
                                <a href="{{ route('admin.restore', $row->id) }}" class="btn btn-sm btn-primary mx-1">Pulihkan</a>
                                <form action="{{ route('admin.forceDelete', $row->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus Permanen</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
