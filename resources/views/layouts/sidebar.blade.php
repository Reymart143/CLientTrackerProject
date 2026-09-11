 
 <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="../dashboard/index.html" class="navbar-brand">
                <div class="row">

                </div>
                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal" >
                        <img src="{{url('assets/images/avatars/01.png')}}" 
                            alt=" Logo" 
                            class="img-fluid" style="width: 40px;margin-left:7mm">
                    </div>
                    <div class="logo-mini" >
                        <img src="{{url('assets/avatars/01.png')}}" 
                            alt=" Logo" 
                            class="img-fluid" style="width: 90px;margin-left:5mm">
                    </div>
                </div>
                <!--logo End-->
                
                
                
              <div class="text-center">
                    {{-- <h4 class="logo-title mb-1"> CLIENT</h4> --}}
                    <span class="badge bg-primary p-2" style="margin-left:5mm">CTP</span>
                </div>

               
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Home</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                   <li class="nav-item">
                        <a class="nav-link {{ request()->is('Dashboard*') ? 'active' : '' }}" 
                        aria-current="page" href="{{ url('/Dashboard') }}">
                            <i class="icon">
                                {{-- <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                </svg> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                                <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAEF0lEQVR4AaxWbUxTVxh+eunCEMLHEAIjM9NNPoeCCVOHceAH0E10G5vsw2U/0A0zDNiMYYeCFRCxwwpd24HKh7I5xbhlC3OJ0TVjjmQq02WQZSyIUhc+ZYxLW1rWes4tPZHSYn94c55z3r7P+77Pfc897S0H+yUmi/8jBq0JKpC4ecurA4VFsvFHiXTJywPkhhM5sVicrVJ/HrxbWggHMje/ghdT1mHH+zuZz8F5uu4vOxQMcNm0Ay9yETGgu6sL0qyX0J73Nj78QI7sdw5DeUQJm80q8J5ONiFQBI6DFxUAvYaGBtFckIODoRy2LQlDUNBiLFtZjD9uJaHmaC0N8RgWiwV2EdKDI+tU4wnsXhQIL5HI4RLW0PAkXNSNwmAwCJ+dpy+/OIXXcvNRKNvDKJPJzGzWAX+rB8HejwkEb/kfgwO/ofNKuYDhwT/xd89fAuc83dXr8e+qN9A7NsmoSYOR2UzA5uMrtEWLy+904afGLnRoNQIKsi4jMDCIJc1nGIwmWKanWQgTSJZsQmvfEGjxykM8ngoDxF4gDxj4vX8FFoaEoId0cft2H0t2Nu7dG8WNmzcxMjLMKM5hbUzLQHdCCpLW8whfaPf+Q+LyFaHIyVPjhwtteL1cgy3bc+2ki1nx6WGUtp+BQqVgLBOgnoqDVQhb8RWk9W9CqpWgTrcHUvnPWBoZSWn4xydDHBwu2M6TmZwck9mCJyVrwPk+zuhZAtS7fsNGlJSpsbe8BfkFhXgimHxfKPEATjY34oXtWcjYmsm8jmPJHDMGEzjXegYH5CVzUFlRRp7D7HSz2YzF72bCFhIAo2lqppTrhQkEBgYhIiKCIT1dgpLSA5AV74NIJBIw3nkZ08N3BUH9hXaYBkaEEzN25TtYJ8Zgs1px5/wlWHmnY8pPGhAVE4c1a9cxLHp6CSZ4wwwmkbw2FS2f5KHpqBIpGySo3roLtfIj2PZeDo7tfAtV++XIzd0FxaYd2PvRPtYOZyWqxbIiKKoqoVbVMNCtKZZ9DDuKUC4vxfE6LRrqtVApFTjZeBwn6jRQ11QL9jHtZ9ColIJdp6lFdVUFaG2yRRwSEld5hOiY5YiOSfAoNiFxJemCo+8Dq9E8Nf+DIpHC4PkJ8Px/gv2waUqoaTXSLapvatDozrW29LrC2dNNo9+cP41vvz6LX9p1AqhNfZRzlUN9zQ1aHbmJerJF0Pf396Xe6Pz1GVcgPw1Xo56NR9TS52aD+EjeNVc51Ee4VCKgpwJkdTtWx8Ysy+DIm8M5gvqiI+PTiX81gdvhTiAtNm75eNLzyT/aRFb09Ha7hI2zgcbExsWPE4U0gjnDnYC3z4IF/v4BAd6+fn6YDzTGx8eP/iPxnlOdONwJtF2/2uF/6eL3HuH6tQ4q0EbqzRn3AQAA//+MoNCGAAAABklEQVQDAF5HOO/PT8uoAAAAAElFTkSuQmCC" x="0" y="0" width="24" height="24"/>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    @if(Auth::user()->role == 0)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('projects*') ? 'active' : '' }}" 
                        aria-current="page" href="{{ url('/projects') }}">
                            <i class="icon">
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                                    <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAFZUlEQVR4AeyTe1BUZRjGn3N295yzd5aVXREQFUQTDcY0LwPegQRFk0adMrUmpVKcLLVQxEp0psFJrSkmG8z7LTANwQtjkY6hljeQi9xNQFhgF9hdd8+eW2uDjg6O5R/+1zvzzffNN9/7/N7vnfch8Zzjf8C/NviJLVp66M/YqO35+5efLVtVJknU01TezNq37oWV6wsX7D244UnvegFW/1Qa+2tt6+kaQvd67pWKzOzThey5rtKETWfWbk4/vvTCmn3vnPq+KGvFfbFFGdvy8opvZDQJqmn7Txd/Oj0zK//+/aOrF6CN1Cd2Uwa45Cp4ZBRYkUCTzTLJyrenNrJ14+3q1rgK67XMHy7mfBI0dHAnRZthdzDQ+oXgRk1j/NU2Z7+nAq5XVS6TaAZdThcoioFOp4PD2TnS1t0KSgtIjAtOrpUiaT5IIjkTy0kgSQ1YFwGPByAZueGpgOB+GsBtg1YmA80DkWGD0Xr7zhSDSgWS9UDm4aBTUrA0VoaPHBHSxigAgXVDJolQ0nJvYV3za61WPXqiV4sWzh0XpYUbWnggOjvByBVQU2rALXoUogIUScHjZht1em0gz7MmjrVDp1FActnBO504lnM0zWRQ0OiJxwDNkqTyk6MqgJGglmzoa6Dhb9DkvjI16Xc13aeLJrQQeBISqL6TomcXtbY7RlEqAhzbDrOWQfyECZgcPfWyAxqpRx8PAeUuKTj7ZEnJkdxLlnUpCTPHDjFjTXJiUcGp/KTqupv+Ro3ZJuOUYAQ9gvxCOA/PGQcFm0tjxw+HmmvHxBfDsHjuzPNukeKtDky0SZJPuyQF/ANI2HmiPu7rQw3f3awKKbpVD0sbVgxUsQiVuZjIUGXl0EHGijEjR92gWC18hX4YHxZ1nO204OUg/zPvz4nKHxugRMqc6fsNFLjdxwrGL0rN+HHzwfy0WhYnyI/rPBElnZ4Bbdp+6FD5gtIwIISuwLjogderq/Pst6p/Gbrr0PZ4wEMmJryKmClxTh+tht9zOGv23pNbMmprCpXpqQuyTFr+WsnVcoeh/yA0OATsOfHbR+dKmyLJthYxlhMNcHtnmfCQCA/pCx91R1lObkZk8dWDMS2uKtjRgfK6iiSPzI0W+x31peqiBapgHvXu6zhfe3TK7oIt79Va/ph69uLJiMLiC+gmaUBrRoPFAbLT5TZDkkFH09DLgUA/JW5VFpsEWCGnHRCJLtBKAU2WWpTVXEGbuxmN9gZYuVawTDc4ZTcElQPlTSWuiKiIZZJM9M6t1y+iHA31dyXSznUyFM1Cx92FoqsBwQOMsLOOAF6AdwIUUEoC5IIdLlcTmq2V+Mu7OlwtYAkRkCkhSgQEuYQ7TqukMaptap792UxKLNHtdClFWR45wqjIjhnctyAuxIjXxgyBiRFgt1pCfHx8IYgSeK+BeIn32sCJrntWdHZ3gOM4yEGD9AAaiQbjdbNCEoabjT5N0eH9D8eOHPJ20uQxCyMH+O8kvxwdcC17+oiE1Gmjj6yOGYdROn2H4p4Nnnt2709YCJQSbhntrVIDTqTB2iXQnBJG0gcapwI6BwG1jQXT3sEmGIbd3vNhyoHslKQD3747LSctcfBxEj0RqiHm+RMEwYhu4xDzQBgpM0L9I+DLBCNQPwxmVdiFPopB2wK1wzYFKMM+74P+GUFMSGZ/VdiOoX7hu0yk7+Ueqce2h4AHt3qyT/qs6PnCwmnLmhdNWp6cHPOZ9o2XlhjXxm6LSp/xzcrU+K/SVsVv3bBm1tb1H8ze7vXi1uTFM754a8m8jUseaDy69wLQhGKjr8IkD1CHBfgRoTtMhMkRpA+3Ppr0LOdegGdJ/i9vnzvgbwAAAP//VDBfdgAAAAZJREFUAwDNskpPGGqMRQAAAABJRU5ErkJggg==" x="0" y="0" width="24" height="24"/>
                                </svg>
                            </i>
                            <span class="item-name">Projects</span>
                        </a>
                    </li>
                  
                  
                    @endif
                </ul>
<!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>   
    <main class="main-content">
      <div class="position-relative iq-banner">
        
