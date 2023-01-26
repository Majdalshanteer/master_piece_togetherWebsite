
   @if (Auth::user()->type == 'Worker')
@include('workerdashboard/layouts/header')
@include('workerdashboard/layouts/sidebar')
@yield('content')

@include('workerdashboard/layouts/footer')












@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

body {
  display: flex;
  flex-flow: row wrap;
  align-content: center;
  justify-content: center;
}

div {
  width: 100%;
  text-align: center;

}

.number {
    margin-top: 5%;
  background: #fff;
  position: relative;
  font: 900 30vmin "Consolas";
  letter-spacing: 5vmin;
  text-shadow: 2px -1px 0 #000, 4px -2px 0 #0a0a0a, 6px -3px 0 #0f0f0f, 8px -4px 0 #141414, 10px -5px 0 #1a1a1a, 12px -6px 0 #1f1f1f, 14px -7px 0 #242424, 16px -8px 0 #292929;
}
.number::before {
  background-color: #673ab7;
  background-image: radial-gradient(closest-side at 50% 50%, #ffc107 100%, rgba(0, 0, 0, 0)), radial-gradient(closest-side at 50% 50%, #e91e63 100%, rgba(0, 0, 0, 0));
  background-repeat: repeat-x;
  background-size: 40vmin 40vmin;
  background-position: -100vmin 20vmin, 100vmin -25vmin;
  width: 100%;
  height: 100%;
  mix-blend-mode: screen;
  -webkit-animation: moving 10s linear infinite both;
          animation: moving 10s linear infinite both;
  display: block;
  position: absolute;
  content: "";
}
@-webkit-keyframes moving {
  to {
    background-position: 100vmin 20vmin, -100vmin -25vmin;
  }
}
@keyframes moving {
  to {
    background-position: 100vmin 20vmin, -100vmin -25vmin;
  }
}

.text {
  font: 400 5vmin "Courgette";
}
.text span {
  font-size: 10vmin;
}

        </style>
</head>
<body>

    <div  class="number ">404</div>
    <div class="text"><span>Sorry...</span><br>This Page Is Available For Workers...</div>
    <a class="me" href="http://127.0.0.1:8000/" >Home</a>
</body>
</html>

@endif
