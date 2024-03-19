<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="#">Bootstrap</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav " >
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dataPegawai') }}">Pegawai</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dataProduct') }}">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dataUser') }}">User</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto text-decoration-none text-white">
            <li class="nav-item">
                <a href="{{ url('login') }}" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
