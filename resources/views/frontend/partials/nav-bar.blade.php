<ul>
  <li><a href="#">Home</a></li>
  <li class="dropdown">
    <a href="#">About <i class="ml-1 fas fa-chevron-down"></i></a>
    <div class="dropdown-content">
      <a href="{{ route('company.overview') }}">Company Profile</a>
      <a href="/#company-vision">Vision/ Company Overview/ Objective
      </a>
      <a href="/#chairman">Message From Chairman</a>
      {{-- <a href="#">Message From International Marketing Director</a>
      <a href="#">Message From Director</a> --}}
      <a href="#">Our Team</a>
      <a href="#">License & Certificates</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="#">Our Services <i class="ml-1 fas fa-chevron-down"></i></a>
    <div class="dropdown-content">
      <a href="#">Job Categories</a>
      <a href="#">Requirements</a>
    </div>
  </li>
  <li><a href="#">About Nepal</a></li>
  <li><a href="#">Clients</a></li>
  <li class="login"><a href="{{route('login')}}">Login</a></li>
</ul>
