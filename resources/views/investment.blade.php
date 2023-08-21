@extends('layouts.app')

@section('content')
 <!--=======Banner-Section Starts Here=======-->
      <section
        class="bg_img hero-section-2"
        data-background="assets/images/about/hero-bg2.jpg"
      >
        <div class="container">
          <div class="hero-content text-white">
            <h1 class="title">Plan</h1>
            <ul class="breadcrumb">
              <li>
                <a href="index.html">Home</a>
              </li>
              <li>Plan</li>
            </ul>
          </div>
        </div>
        <div class="hero-shape">
          <img
            class="wow slideInUp"
            src="assets/images/about/hero-shape1.png"
            alt="about"
            data-wow-duration="1s"
          />
        </div>
      </section>
      <!--=======Banner-Section Ends Here=======-->

      <!--=======Offer-Section Stars Here=======-->
      <section class="offer-section padding-top padding-bottom">
        <div
          class="ball-group-1"
          data-paroller-factor="-0.30"
          data-paroller-factor-lg="0.60"
          data-paroller-type="foreground"
          data-paroller-direction="horizontal"
        >
          <img src="assets/images/balls/ball-group1.png" alt="balls" />
        </div>
        <div
          class="ball-group-2"
          data-paroller-factor="0.30"
          data-paroller-factor-lg="-0.30"
          data-paroller-type="foreground"
          data-paroller-direction="horizontal"
        >
          <img src="assets/images/balls/ball-group2.png" alt="balls" />
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
              <div class="section-header">
                <span class="cate">INVESTMENT OFFER</span>
                <h2 class="title">OUR INVESTMENT PLANS</h2>
                <p>
                  alstomfx provides a straightforward and transparent mechanism
                  to attract investments and make more profits.
                </p>
              </div>
            </div>
          </div>
          <div class="offer-wrapper">
            <div class="offer-item">
              <div class="offer-header">
                <h3 class="title">20%</h3>
                <span><b>1 month</b></span>
              </div>
              <div class="offer-body">
                <span class="bal-shape"></span>
                <div class="item first">
                  <div class="item-thumb">
                    <img src="assets/images/offer/offer1.png" alt="offer" />
                  </div>
                  <div class="item-content">
                    <h5 class="title">Deposit</h5>
                    <h5 class="subtitle">
                      <span class="min">&#8358;200,000</span
                      ><span class="to">to</span
                      ><span class="max">&#8358;5,000,000</span>
                    </h5>
                  </div>
                </div>
                <span class="bal-shape"></span>
                <div class="item">
                  <div class="item-thumb">
                    <img src="assets/images/offer/offer2.png" alt="offer" />
                  </div>
                  <div class="item-content">
                    <h5 class="title">Term</h5>
                    <h5 class="subtitle">30 days</h5>
                  </div>
                </div>
              </div>
              <div class="offer-footer">
                <a href="/register" class="custom-button">invest now</a>
              </div>
            </div>
            <div class="offer-item">
              <div class="offer-header">
                <h3 class="title">25%</h3>
                <span><b>3 months</b></span>
              </div>
              <div class="offer-body">
                <span class="bal-shape"></span>
                <div class="item first">
                  <div class="item-thumb">
                    <img src="assets/images/offer/offer1.png" alt="offer" />
                  </div>
                  <div class="item-content">
                    <h5 class="title">Deposit</h5>
                    <h5 class="subtitle">
                      <span class="min">&#8358;200,000</span
                      ><span class="to">to</span
                      ><span class="max">&#8358;5,000,000</span>
                    </h5>
                  </div>
                </div>
                <span class="bal-shape"></span>
                <div class="item">
                  <div class="item-thumb">
                    <img src="assets/images/offer/offer2.png" alt="offer" />
                  </div>
                  <div class="item-content">
                    <h5 class="title">Term</h5>
                    <h5 class="subtitle">60 days</h5>
                  </div>
                </div>
              </div>
              <div class="offer-footer">
                <a href="/register" class="custom-button">invest now</a>
              </div>
            </div>
            <div class="offer-item">
              <div class="offer-header">
                <h3 class="title">30%</h3>
                <span><b>6 months</b></span>
              </div>
              <div class="offer-body">
                <span class="bal-shape"></span>
                <div class="item first">
                  <div class="item-thumb">
                    <img src="assets/images/offer/offer1.png" alt="offer" />
                  </div>
                  <div class="item-content">
                    <h5 class="title">Deposit</h5>
                    <h5 class="subtitle">
                      <span class="min">&#8358;200,000</span
                      ><span class="to">to</span
                      ><span class="max">&#8358;5,000,000</span>
                    </h5>
                  </div>
                </div>
                <span class="bal-shape"></span>
                <div class="item">
                  <div class="item-thumb">
                    <img src="assets/images/offer/offer2.png" alt="offer" />
                  </div>
                  <div class="item-content">
                    <h5 class="title">Term</h5>
                    <h5 class="subtitle">90 days</h5>
                  </div>
                </div>
              </div>
              <div class="offer-footer">
                <a href="/register" class="custom-button">invest now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--=======Offer-Section Ends Here=======-->

      <!--=======Proit-Section Starts Here=======-->
      <section class="profit-section padding-top" id="profit">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
              <div class="section-header">
                <span class="cate">Calculate the amazing profits</span>
                <h2 class="title">You Can Earn</h2>
                <p>Calculate your profit before making an investment.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid p-0">
          <div
            class="profit-bg bg_img"
            data-background="assets/images/profit/profit-bg.png"
          >
            <div class="animation-group">
              <div class="platform">
                <img src="assets/images/profit/platform.png" alt="profit" />
              </div>
              <div class="light">
                <img src="assets/images/profit/light.png" alt="profit" />
              </div>
              <div class="coin-1 wow fadeOutDown" data-wow-delay="1s">
                <img src="assets/images/profit/coin6.png" alt="profit" />
              </div>
              <div class="coin-2 wow fadeOutDown" data-wow-delay="1s">
                <img src="assets/images/profit/coin2.png" alt="profit" />
              </div>
              <div class="coin-3 wow fadeOutDown" data-wow-delay="1s">
                <img src="assets/images/profit/coin3.png" alt="profit" />
              </div>
              <div class="coin-4 wow fadeOutDown" data-wow-delay="1s">
                <img src="assets/images/profit/coin4.png" alt="profit" />
              </div>
              <div class="coin-5 wow fadeOutDown" data-wow-delay="1s">
                <img src="assets/images/profit/coin5.png" alt="profit" />
              </div>
              <div class="coin-6 wow fadeOutDown" data-wow-delay="1s">
                <img src="assets/images/profit/coin1.png" alt="profit" />
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="calculate-wrapper tab">
            <div class="calculate--area">
              <div class="calculate-area">
                
                <div class="calculate-item">
                  <h5 class="title" data-serial="02">Select the plan</h5>
                  <ul class="tab-menu">
                    <li class="active" >20%</li>
                    <li>25% </li>
                    <li>30% </li>
                   
                  </ul>
                </div>
                 
                <div class="calculate-item">
                  <h5 class="title" data-serial="03">Enter the amount</h5>
                  <input type="number" value="200000" id="myInput" oninput="myFunction()" />
                </div>
              </div>
              <div class="tab-area">
                <div class="tab-item active">
                  <div class="profit-calc">
                    <div class="item">
                      <span class="cate">Capital</span>
                      <h2 id="demo" class="title cl-theme-1">&#8358;200,000</h2>
                    </div>
                    <div class="item">
                      <span class="cate">Total Profit</span>
                      <h2 id="demo2" class="title cl-theme">&#8358;20,000</h2>
                      <br />
                      <p>20% Monthly, 1 Month</p>
                    </div>
                  </div>
                  <script>
function myFunction() {
  var x = document.getElementById("myInput").value;
  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo3").innerHTML = x;
  document.getElementById("demo4").innerHTML = x;
  document.getElementById("demo2").innerHTML = x * 0.20;
  document.getElementById("second").innerHTML = x * 0.25;
  document.getElementById("third").innerHTML = x * 0.30;
}

</script>

                   
                </div>
              
                <div class="tab-item">
                  <div class="profit-calc">
                    <div class="item">
                      <span class="cate">Capital</span>
                      <h2 id="demo3" class="title cl-theme-1">&#8358;200,000</h2>
                    </div>
                    <div class="item">
                      <span class="cate">Total Profit</span>
                      <h2 id="second" class="title cl-theme">&#8358;25,000</h2><br />
                      <p>25% Monthly, 3 Months</p>
                    </div>
                  </div>
                  
                    
                </div>
                <div class="tab-item">
                  <div class="profit-calc">
                    <div class="item">
                      <span class="cate">Capital</span>
                      <h2 id="demo4" class="title cl-theme-1">&#8358;200,000</h2>
                    </div>
                    <div class="item">
                      <span class="cate">Total Profit</span>
                      <h2 id="third" class="title cl-theme">&#8358;30,000</h2><br />
                      <p>30% Monthly, 6 Months</p>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--=======Proit-Section Ends Here=======-->
      <section
        class="faq-section padding-top padding-bottom bg_img"
        data-background="assets/images/feature/feature-bg.png"
      >
        <div
          class="ball-group-1"
          data-paroller-factor="-0.30"
          data-paroller-factor-lg="0.60"
          data-paroller-type="foreground"
          data-paroller-direction="horizontal"
        >
          <img src="assets/images/balls/ball-group5.png" alt="balls" />
        </div>
        <div
          class="ball-group-2 rtl"
          data-paroller-factor="0.30"
          data-paroller-factor-lg="-0.30"
          data-paroller-type="foreground"
          data-paroller-direction="horizontal"
        >
          <img src="assets/images/balls/ball-group6.png" alt="balls" />
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
              <div class="section-header">
                <span class="cate">You have questions</span>
                <h2 class="title">we have answers</h2>
                <p class="mw-100">
                  Do not hesitate to send us an email if you can't find what
                  you're looking for.
                </p>
              </div>
            </div>
          </div>
          <div class="faq-wrapper">
            <div class="faq-item">
              <div class="faq-title">
                <h5 class="title">
                 What do we Invest in?
                </h5>
                <span class="right-icon"></span>
              </div>
              <div class="faq-content">
                <p>
                We have assembled a team of expert traders who trade financial instruments like shares, bonds, currencies, and
                commodities. We trade in Cryptocurrencies, stocks, Import & Export, corporate fixed deposits and various other
                investment products.
                </p>
              </div>
            </div>
            <div class="faq-item active open">
              <div class="faq-title">
                <h5 class="title">How do I Become An Investor?</h5>
                <span class="right-icon"></span>
              </div>
              <div class="faq-content">
                <p>
                We have 3 investment packages, Gold which comes with 20% interest and last for a month. Diamond which comes with 25%
                interest monthly and last for 3 months. and Platinum which comes with 30% interest monthly and lasts for 6 months.
                </p>
              </div>
            </div>
            <div class="faq-item">
              <div class="faq-title">
                <h5 class="title">
                  How Many Investment Plans Do You Have?
                </h5>
                <span class="right-icon"></span>
              </div>
              <div class="faq-content">
                <p>
                  Ea commodi eius nisi fugiat eligendi neque repellendus vero,
                  aliquam temporibus, dicta optio eveniet saepe. Beatae hic
                  fugiat qui possimus doloribus? Ratione, molestiae magnam.
                </p>
              </div>
            </div>
            <div class="faq-item">
              <div class="faq-title">
                <h5 class="title">
                  How long will the money arrive in my account after the
                  withdrawal process?
                </h5>
                <span class="right-icon"></span>
              </div>
              <div class="faq-content">
                <p>
                Withdrawal request takes 24 hours.
                </p>
              </div>
            </div>
            <div class="faq-item">
              <div class="faq-title">
                <h5 class="title">
                  How Can I make Deposit?
                </h5>
                <span class="right-icon"></span>
              </div>
              <div class="faq-content">
                <p>
                We have four methods of payment; Bank Deposit, Bitcoin, PerfectMoney, Skrill. Upon creating an account, an account will
                be provided to you on your dashboard where you can deposit your investment, which will be confirmed immediately.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--=======Feature-Section Ends Here=======-->
       
@endsection
