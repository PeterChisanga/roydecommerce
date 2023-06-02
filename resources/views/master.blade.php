<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SAMALA SUPPLIERS LIMITED</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/datepicker3.css') }}">
	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
	<link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/on-off-switch.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
	<link rel="stylesheet" href="{{ asset('style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}

</body>
<style>

/* ---------------------------------New CSS Code------------------------------ */
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;

}

body {
  font-family: "Poppins", sans-serif;
  /* height: 100vh;
  width: 100vw;
   overflow-x: hidden; */
}

.navbar {
  display: flex;
  align-items: center;
  padding: 0px 20px;
  margin-bottom:0px;
  background-color: #f7d917;
}

.navbar .logo img {
  height:90px;
  width:auto;
}

nav {
  flex: 1;
  text-align: right;
}
nav ul {
  display: inline-block;
  list-style-type: none;
}

nav ul li {
  display: inline-block;
  margin-right: 20px;
  font-size: 24px;
  color: #000;
}

nav ul li a:hover {
  color:#fff;
} 

.menu-icon {
  display: none;
}

a {
  text-decoration: none;
  color: #555;
}
P {
  color: #555;
}

/* --------------------------Category------------------------ */
.category {
    display: flex;
    justify-content: center;
    align-items: center;
}

.category ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.category li {
    color: #000;
    margin: 0 15px;
    padding: 7px 40px;
    font-size: 1.5em;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: 1.2s;
}

.category li:hover {
    color: #fff;
    background-color:#000;
}

.category a {
    color: inherit;
    text-decoration: none;
}

@media screen and (max-width: 768px) {
    .category li {
        font-size: 1em;
        padding: 5px 12px;
    }
}

@media screen and (max-width: 480px) {
    .category li {
        font-size: 0.8em;
        padding: 3px 4px;
    }
}

/* ---------------------Carousel---------------------------------------- */

.carousel .item {
  position: relative;
  width: 100%;
  height: 70vh;
  background-size: contain;
  background-position: center center;
  background-repeat: no-repeat;
}

.carousel .item::before {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.1);
}

.carousel .carousel-control {
  z-index: 2;
}

h2 {
  text-align: center;
  color: #000;
  background-color: #FFD700;
  padding: 5px;
  margin: 3px 0;
  font-family: Arial, sans-serif;
  font-size: 16px;
}


.container {
  max-width: 1300px;
  margin: auto;
  padding-left: 25px;
  padding-right: 25px;
  height:100vh;
}

.row {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  justify-content: center;
}

.col-2 {
  flex-basis: 50%;
  min-width: 300px;
  height: 80%;
}

.col-2 img {
  max-width: 100%;
  height:500px;
}

.single-product .col-2 img {
  margin-left:40px;
  max-width: 70%;
  height:auto;
}

.col-2 label {
  margin-top:10px; 
  font-size:20px;
}

.col-2 select {
  height:50px;
}

.col-2 h1 {
  font-size: 50px;
  line-height: 60px;
  margin: 25px 0;
}

.btn {
  display: inline-block;
  background: #f1a731;
  color: white;
  padding: 10px 30px;
  margin: 30px 0;
  border-radius: 30px;
  transition: background 0.5s;
}

.btn:hover {
  background-color: #be6805;
}

/* ---------------products page--------------- */

.header {
    background: radial-gradient(circle at center,#f7d002  10%, #ffffff 100%);
    color: #000000;
}

.header .row {
  margin-top: 70px;
}
.categories {
  margin: 70px 0;
}

.col-3 {
  flex-basis: 30%;
  min-width: 250px;
  margin: 15px;
}
.col-3 img {
  width: 100%;
}

/* ------------------------- product page ---------------- */
.small-container {
  max-width: 95%;
  margin: auto;
  padding-left: 25px;
  padding-right: 25px;
}

.col-4 {
  flex-basis: 20%;
  padding: 3px;
  min-width: 210px;
  margin:15px 15px 10px 15px;
  transition: transform 0.5s;
  height: 450px;
  overflow: hidden;
    background-color: rgb(244, 239, 239);
    border-radius:10px;
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);

}
.col-4 .col-4-a{
  background-color:white;
}

.img-div{
  height:340px;
  overflow: hidden;
  display: flex;           /* Added these lines */
  justify-content: center; /* to center the image vertically */
  align-items: center;     /* and horizontally */
  background-color: white;

}

.col-4 a h4,.col-4 a .rating{
  padding-left:10px;
}

.img-div img {
  width:100%;
  height:100%;
  object-fit: contain; /* changed from cover to contain */
}




.title {
  text-align: center;
  margin: 0 auto 80px;
  position: relative;
  line-height: 60px;
  color: #555;
}  

.title::after {
  content: " ";
  background: #ff523b;
  width: 80px;
  height: 5px;
  border-radius: 5px;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

h4 {
  color: #555;
  font-weight: normal;
}

.col-4 p {
  font-size: 14px;
}
.rating .fa {
  color: #ff523b;
}

.col-4:hover {
  transform: translateY(-5px);
}

/* ---------------offer ------------- */

.offer {
  background: radial-gradient(#fff, #ffd6d6);
  margin-top: 80px;
  padding: 30px 0;
}

.col-2 .offer-img {
  padding: 50px;
}

small {
  color: #555;
}

/* ----------------- testimonial ---------------- */

.testimonial {
  padding-top: 100px;
}

.testimonial .col-3 {
  text-align: center;
  padding: 40px 20px;
  box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: transform 0.5s;
}

.testimonial .col-3 img {
  width: 50px;
  margin-top: 20px;
  border-radius: 50%;
}
.testimonial .col-3:hover {
  transform: translateY(-10px);
}

.fa .fa-quote-left .fa .fa-quote-right {
  color: #ff523b;
}

col-3 p {
  font-size: 12px;
  margin: 12px 0;
  color: #777;
}

.testimonial .col-3 h3 {
  font-weight: 600;
  color: #555;
  font-size: 16px;
}

/* -----------------Brands---------------- */
.brands {
  margin: 100px auto;
}

.col-5 {
  width: 160px;
}

.col-5 img {
  width: 100%;
  cursor: pointer;
  filter: grayscale(100%);
}

.col-5 img:hover {
  filter: grayscale(0);
}

/* -------------------- all products----------------- */

.row-2 {
  justify-content: space-between;
  margin: 100px auto 50px;
}

select {
  border: 1px solid #ff523b;
  padding: 5px;
}
select:focus {
  outline: none;
}

.page-btn {
  margin: 0 auto 80px;
}

.page-btn span {
  display: inline-block;
  border: 1px solid #ff523b;
  margin-left: 10px;
  width: 40px;
  height: 40px;
  text-align: center;
  line-height: 40px;
  cursor: pointer;
}

.page-btn span:hover {
  background-color: #ff523b;
}

.single-product {
  margin-top: 80px;
}
.single-product .col-2 img {
  padding: 0;
}
.single-product .col-2 {
  padding: 20px;
}
.single-product h4 {
  margin: 20px 0;
  font-size: 22px;
  font-weight: bold;
}

.single-product select {
  display: block;
  margin-top: 20px;
  padding: 10px;
}

.single-product input {
  width: 50px;
  height: 40px;
  padding-left: 10px;
  font-size: 20px;
  margin-right: 10px;
  border: 1px solid #ff523b;
}

input:focus {
  outline: none;
}

.single-product .fa {
  color: #ff523b;
  margin-left: 10px;
}

.small-img-row {
  display: flex;
  justify-content: space-between;
}

.small-img-col {
  flex-basis: 24%;
  cursor: pointer;
}

/* ---------------cart items--------------- */
.cart-page {
  margin: 80px auto;
}
table {
  width: 100%;
  border-collapse: collapse;
}

.cart-infor {
  display: flex;
  flex-wrap: wrap;
}
th {
  text-align: left;
  padding: 5px;
  color: #fff;
  background: #ff523b;
  font-weight: normal;
}
td {
  padding: 10px 5px;
}
td input {
  width: 40px;
  height: 30px;
  padding: 5px;
}
td a {
  color: #ff523b;
  font-size: 12px;
}
td img {
  width: 80px;
  height: 80px;
  margin-right: 10px;
}

.total-price {
  display: flex;
  justify-content: flex-end;
}
.total-price table {
  border-top: 3px solid #ff523b;
  width: 100%;
  max-width: 400px;
}

td:last-child {
  text-align: right;
}
th:last-child {
  text-align: right;
}

/* ------------------account page ------------------------- */
.account-page {
  padding: 50px 0;
  background: radial-gradient(#fff, #ffd6d6);
}

.form-container {
  background: #fff;
  width: 300px;
  height: 400px;
  position: relative;
  text-align: center;
  padding: 20px 0;
  margin: auto;
  box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.form-container span {
  font-weight: bold;
  padding: 0 10px;
  color: #555;
  cursor: pointer;
  width: 100px;
  display: inline-block;
}

.form-btn {
  display: inline-block;
}

.form-container form {
  max-width: 300px;
  padding: 0 20px;
  position: absolute;
  top: 130px;
  transition: transform 1s;
}

form input {
  width: 100%;
  height: 30px;
  margin: 10px 0;
  padding: 0 10px;
  border: 1px solid #ccc;
}

form .btn {
  width: 100%;
  border: none;
  cursor: pointer;
  margin: 10px 0;
}

form .btn:focus {
  outline: none;
}

#LoginForm {
  left: -300px;
}

#RegForm {
  left: 0;
}

form a {
  font-size: 12px;
}

#indicator {
  width: 100px;
  border: none;
  background: #ff523b;
  height: 3px;
  margin-top: 8px;
  transform: translateX(100px);
  transition: transform 1s;
}

/* --------------------- media query for menu --------------------------- */

@media only screen and (min-width: 1580px) {
  .col-4{
    height: 450px;
  }
}

@media only screen and (max-width: 800px) {
  nav ul {
    position: absolute;
    top: 50px;
    left: 0;
    background: #000;
    width: 100%;
    overflow: hidden;
    transition: max-height 1s;
  }
  nav ul li {
    display: block;
    margin-right: 50px;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  nav ul li a {
    color: #fff;
  }

  .menu-icon {
    display: block;
    cursor: pointer;
    width:30px;
    heght:30px;
    margin-left: 15px;
  }

  .col-4{
  margin-bottom: 0px;
  padding-bottom:.5px;
  }
} 



/* -----------media query for less than 600 screen resolutions------------ */
@media only screen and (max-width: 680px) {

  nav ul li {
    font-size: 12px;
  }

  .navbar .logo img {
    height:45px;
    width:auto;
  }

  #MenuItems{
     margin-top:0px;
  }

  .header .row {
    margin-top: 0px;
  }

  .row {
    text-align: center;
  }

  .col-2{
    margin-bottom:10px;
    padding-bottom:0px;
    margin:0px;
     min-width: 90px;
  }

  .col-2 img {
    max-width: 100%;
    height: auto;
  }

  .col-2 h1{
    font-size: 25px;
    line-height: 30px;
    margin:10px 0px;
  }

  .col-2,
  .col-3 {
    flex-basis: 100%;
  }

  .small-container {
    padding:0px;
    width: 100%;
  }

  .custom-row{
    margin:0px;
  }

  .col-4{
    height: 270px;
    /* width:auto; */
    /* width: 60px;
    height:auto; */
     min-width: 110px;
    margin-bottom: 0px;
    padding-bottom:.5px;
    flex-basis: 40%;
  }

  .col-4 a h4,.col-4 a .rating{
    font-size:12px;
  }

  .img-div{
    height:180px;

  }

  .single-product .row {
    text-align: left;
  }
  .single-product .col-2 {
    padding: 20px 0;
  }
  .single-product h1 {
    font-size: 26px;
    line-height: 32px;
  }
  .cart-infor p {
    display: none;
  }
  .account-contact {
    margin-top: 20px;
  }
}

@media only screen and (max-width: 980px) {
  .col-2 img {
    max-width: 100%;
    height:480px;
  }
} 
</style>
</html>

