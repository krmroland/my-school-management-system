<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="/">
   My School
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    @auth
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('courseUnits.index') }}">
         Course Units
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/timetable">
         Timetable
        </a>
      </li>

    </ul>
    <ul class="navbar-nav ml-auto mr-5 align-items-center my-0 py-0">
      <intakes-component 
          :intakes="{{ auth()->user()->allIntakes()}}"
        ></intakes-component>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between " href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <icon-user></icon-user>
          <span class="ml-2 srong">{{  auth()->user()->name }}</span>
        </a>
        <div class="dropdown-menu  dropdown-menu-right" 
        aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="#">My Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout">
              <i class="fa fa-sign-out"></i>
              logout
          </a>
        </div>
      </li>
     
    </ul>
    @endauth
    
  </div>
</nav>
@auth
<create-new-intake></create-new-intake>
@endauth