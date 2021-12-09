<!DOCTYPE html>
<html dir="ltr" lang="en">


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('assets2/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{url('assets2/img/novax.png')}}">
  <title>
    NOVAX
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{url('assets2/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{url('assets2/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

     <link rel="stylesheet" href="{{ url('assets/bootstrap/dist/css/bootstrap.min.css') }}">
     <link href="{{ url('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ url('assets/bootstrap/dist/css/style.min.css')}}" rel="stylesheet">
     
     
      <link href="{{ url('assets2/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ url('assets2/css/nucleo-svg.css') }}" rel="stylesheet" />
  <link id="pagestyle" href="{{ url('assets2/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="background-color:black;">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
     
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="" >
     
        <img src="{{url('assets2/img/novax.png')}}" width="150" height="150" style="margin-left:50px;">
        
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="{{url('puesto')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Puesto</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('departamentos')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Departamentos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white "  href="{{url('empleados')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Empleados</span>
          </a>
        </li>
        
        
      </ul>
    </div>
    
  </aside>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          
                
                      <div class="d-flex flex-column justify-content-center">
                       
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   
  @yield('content')
        <!--<aside class="left-sidebar " data-sidebarbg="skin6" style=" background: linear-gradient(90deg, black, rgba(131, 68, 68, 0));">-->
            <!-- Sidebar scroll-->
        <!--    <div class="scroll-sidebar" >-->
                <!-- Sidebar navigation-->
        <!--        <nav class="sidebar-nav sidebar-dark" >-->
        <!--            <ul id="sidebarnav">-->
                        <!-- User Profile-->
        <!--                <li class="sidebar-item pt-2">-->
        <!--                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('empleados')}}"-->
        <!--                        aria-expanded="false">-->
        <!--                        <i class="far fa-clock" aria-hidden="true"></i>-->
        <!--                        <span class="hide-menu">Empleados</span>-->
        <!--                    </a>-->
        <!--                </li>-->
        <!--                <li class="sidebar-item">-->
        <!--                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('departamentos')}}"-->
        <!--                        aria-expanded="false">-->
        <!--                        <i class="fa fa-user" aria-hidden="true"></i>-->
        <!--                        <span class="hide-menu">Departamentos</span>-->
        <!--                    </a>-->
        <!--                </li>-->
        <!--                <li class="sidebar-item">-->
        <!--                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('puesto')}}"-->
        <!--                        aria-expanded="false">-->
        <!--                        <i class="fa fa-table" aria-hidden="true"></i>-->
        <!--                        <span class="hide-menu">Puesto</span>-->
        <!--                    </a>-->
        <!--                </li>-->
                        
                        <!--<li class="text-center p-20 upgrade-btn">-->
                        <!--    <a href="https://www.wrappixel.com/templates/ampleadmin/"-->
                        <!--        class="btn d-grid btn-danger text-white" target="_blank">-->
                        <!--        Upgrade to Pro</a>-->
                        <!--</li>-->
        <!--            </ul>-->

        <!--        </nav>-->
                <!-- End Sidebar navigation -->
        <!--    </div>-->
            <!-- End Sidebar scroll-->
        <!--</aside>-->
      
        </main>
 
  <!--   Core JS Files   -->
  @yield('js')
  <script src="{{url('assets2/js/core/popper.min.js')}}"></script>
  <script src="{{url('assets2/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('assets2/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('assets2/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{url('assets2/js/plugins/bootstrap-notify.js')}}"></script>
  <script src="{{url('assets2/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{url('assets2/js/plugins/world.js')}}"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{url('assets2/js/material-dashboard.min.js?v=3.0.0')}}"></script>
</body>

</html>