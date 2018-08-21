<template>
  <div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" v-scroll-class:navbar-shrink=100>
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#" v-scroll-to="'#page-top'">Laravue</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#" v-scroll-to="'#download'">Download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#" v-scroll-to="'#features'">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#" v-scroll-to="'#contact'">Contact</a>
            </li>
            <li class="nav-item">
              <a href="#" @click="showAuth = true" class="nav-link">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead" id="page-top">
      <div class="container h-100">
        <div class="row h-100" v-if="!showAuth">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">New Age is an app landing page that will help you beautifully showcase your new mobile app, or anything else!</h1>
              <a href="#" @click="showAuth = true" class="btn btn-outline btn-xl js-scroll-trigger">Signup Now for Free!</a>
            </div>
          </div>
          <div class="col-lg-5 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/demo-screen-1.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div v-if="showAuth" class="row h-100">
          <div class="col-lg-7 my-auto">
            <login-register />
          </div>
        </div>
      </div>
    </header>

    <section class="download bg-primary text-center" id="download">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2 class="section-heading">Discover what all the buzz is about!</h2>
            <p>Our app is available on any mobile device! Download now to get started!</p>
            <div class="badges">
              <a class="badge-link" href="#"><img src="img/google-play-badge.svg" alt=""></a>
              <a class="badge-link" href="#"><img src="img/app-store-badge.svg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="features" id="features">
      <div class="container">
        <div class="section-heading text-center">
          <h2>Unlimited Features, Unlimited Fun</h2>
          <p class="text-muted">Check out what you can do with this app theme!</p>
          <hr>
        </div>
        <div class="row">
          <div class="col-lg-4 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/demo-screen-1.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 my-auto">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-screen-smartphone text-primary"></i>
                    <h3>Device Mockups</h3>
                    <p class="text-muted">Ready to use HTML/CSS device mockups, no Photoshop required!</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-camera text-primary"></i>
                    <h3>Flexible Use</h3>
                    <p class="text-muted">Put an image, video, animation, or anything else in the screen!</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-present text-primary"></i>
                    <h3>Free to Use</h3>
                    <p class="text-muted">As always, this theme is free to download and use for any purpose!</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-lock-open text-primary"></i>
                    <h3>Open Source</h3>
                    <p class="text-muted">Since this theme is MIT licensed, you can use it commercially!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="cta">
      <div class="cta-content">
        <div class="container">
          <h2>Stop waiting.<br>Start building.</h2>
          <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Let's Get Started!</a>
        </div>
      </div>
      <div class="overlay"></div>
    </section>

    <section class="contact bg-primary" id="contact">
      <div class="container">
        <h2>We
          <i class="fa fa-heart"></i>
          new friends!</h2>
        <ul class="list-inline list-social">
          <li class="list-inline-item social-twitter">
            <a href="#">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item social-facebook">
            <a href="#">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item social-google-plus">
            <a href="#">
              <i class="fa fa-google-plus"></i>
            </a>
          </li>
        </ul>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>&copy; Your Website 2018. All Rights Reserved.</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Privacy</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Terms</a>
          </li>
          <li class="list-inline-item">
            <a href="#">FAQ</a>
          </li>
        </ul>
      </div>
    </footer>
  </div>
</template>
<script>

import LoginRegister from '@/Auth/src/components/LoginRegister';

export default {
  components: {
    LoginRegister
  },
  created () {
    if (this.$route.query.view === 'auth') {
      this.showAuth = true;
    }
  },
  data: () => ({
    showAuth: false
  })
}
</script>
<style lang="scss">

@import './../scss/landing-page.scss';

// Global styling for this template
html,
body {
    width: 100%;
    height: 100%;
}

body {
    @include body-font;
}

a {
    color: $theme-primary;
    @include transition-all;
    &:hover,
    &:focus {
        color: darken($theme-primary, 10%);
    }
}

hr {
    max-width: 100px;
    margin: 25px auto 0;
    border-width: 1px;
    border-color: fade-out($gray-darker, .9);
}

hr.light {
    border-color: white;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    @include heading-font;
}

p {
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 20px;
}

section {
    padding: 100px 0;
    h2 {
        font-size: 50px;
    }
}
// Styling for the masthead
header.masthead {
    position: relative;

    width: 100%;
    padding-top: 150px;
    padding-bottom: 100px;

    color: white;
    background: url('../img/bg-pattern.png'), $theme-secondary;
    background: url('../img/bg-pattern.png'), -webkit-linear-gradient(to left, $theme-secondary, $theme-tertiary);
    background: url('../img/bg-pattern.png'), linear-gradient(to left, $theme-secondary, $theme-tertiary);
    .header-content {
        max-width: 500px;
        margin-bottom: 100px;

        text-align: center;
        h1 {
            font-size: 30px;
        }
    }
    .device-container {
        max-width: 325px;
        margin-right: auto;
        margin-left: auto;
        .screen img {
            border-radius: 3px;
        }
    }
    @media (min-width: 992px) {
        height: 100vh;
        min-height: 775px;
        padding-top: 0;
        padding-bottom: 0;
        .header-content {
            margin-bottom: 0;

            text-align: left;
            h1 {
                font-size: 50px;
            }
        }
        .device-container {
            max-width: 325px;
        }
    }
}
// Styling for the navbar
#mainNav {
    border-color: fade-out($gray-darker, .95);
    background-color: white;
    @include transition-all;
    @include heading-font;
    .navbar-brand {
        color: $theme-primary;
        @include heading-font;
        &:hover,
        &:focus {
            color: darken($theme-primary, 10%);
        }
    }
    .navbar-toggler {
        font-size: 12px;
        padding: 8px 10px;
        color: $gray-darker;
    }
    .navbar-nav {
        > li {
            > a {
                font-size: 11px;
                @include alt-font;
                &.active {
                    color: $theme-primary !important;
                    background-color: transparent;
                    &:hover {
                        background-color: transparent;
                    }
                }
            }
            > a,
            > a:focus {
                color: $gray-darker;
                &:hover {
                    color: $theme-primary;
                }
            }
        }
    }
    @media (min-width: 992px) {
        border-color: transparent;
        background-color: transparent;
        .navbar-brand {
            color: fade(white, 70%);
            &:hover,
            &:focus {
                color: white;
            }
        }
        .navbar-nav > li > a,
        .navbar-nav > li > a:focus {
            color: fade-out(white, .3);
            &:hover {
                color: white;
            }
        }
        &.navbar-shrink {
            border-color: fade-out($gray-darker, .9);
            background-color: white;
            .navbar-brand {
                color: $gray-darker;
                &:hover,
                &:focus {
                    color: $theme-primary;
                }
            }
            .navbar-nav > li > a,
            .navbar-nav > li > a:focus {
                color: $gray-darker;
                &:hover {
                    color: $theme-primary;
                }
            }
        }
    }
}
// Styling for the download section
section.download {
    position: relative;
    padding: 150px 0;
    h2 {
        font-size: 50px;
        margin-top: 0;
    }
    .badges {
        .badge-link {
            display: block;
            margin-bottom: 25px;
            &:last-child {
                margin-bottom: 0;
            }
            img {
                height: 60px;
            }
            @media(min-width: 768px) {
                display: inline-block;
                margin-bottom: 0;
            }
        }
    }
    @media(min-width: 768px) {
        h2 {
            font-size: 70px;
        }
    }
}
// Styling for the features section
section.features {
    .section-heading {
        margin-bottom: 100px;
        h2 {
            margin-top: 0;
        }
        p {
            margin-bottom: 0;
        }
    }
    .device-container,
    .feature-item {
        max-width: 325px;
        margin: 0 auto;
    }
    .device-container {
        margin-bottom: 100px;
        @media(min-width: 992px) {
            margin-bottom: 0;
        }
    }
    .feature-item {
        padding-top: 50px;
        padding-bottom: 50px;
        text-align: center;
        h3 {
            font-size: 30px;
        }
        i {
            font-size: 80px;
            display: block;
            margin-bottom: 15px;
            background: -webkit-linear-gradient(to left, $theme-secondary, $theme-tertiary);
            background: linear-gradient(to left, $theme-secondary, $theme-tertiary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    }
}
// Styling for the call to action section
section.cta {
    position: relative;
    padding: 250px 0;
    background-image: url('../img/bg-cta.jpg');
    background-position: center;
    @include background-cover;
    .cta-content {
        position: relative;
        z-index: 1;
        h2 {
            font-size: 50px;
            max-width: 450px;
            margin-top: 0;
            margin-bottom: 25px;
            color: white;
        }
        @media (min-width: 768px) {
            h2 {
                font-size: 80px;
            }
        }
    }
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: fade-out(black, .5);
    }
}
// Styling for the download section
section.contact {
    text-align: center;
    h2 {
        margin-top: 0;
        margin-bottom: 25px;
        i {
            color: $brand-google-plus;
        }
    }
    ul.list-social {
        margin-bottom: 0;
        li {
            a {
                font-size: 40px;
                line-height: 80px;
                display: block;
                width: 80px;
                height: 80px;
                color: white;
                border-radius: 100%;
            }
            &.social-twitter {
                a {
                    background-color: $brand-twitter;
                    &:hover {
                        background-color: darken($brand-twitter, 5%);
                    }
                }
            }
            &.social-facebook {
                a {
                    background-color: $brand-facebook;
                    &:hover {
                        background-color: darken($brand-facebook, 5%);
                    }
                }
            }
            &.social-google-plus {
                a {
                    background-color: $brand-google-plus;
                    &:hover {
                        background-color: darken($brand-google-plus, 5%);
                    }
                }
            }
        }
    }
}
// Styling for the footer
footer {
    padding: 25px 0;
    text-align: center;
    color: fade-out(white, .7);
    background-color: $gray-darker;
    p {
        font-size: 12px;
        margin: 0;
    }
    ul {
        margin-bottom: 0;
        li {
            a {
                font-size: 12px;
                color: fade-out(white, .7);
                &:hover,
                &:focus,
                &:active,
                &.active {
                    text-decoration: none;
                }
            }
        }
    }
}
// Bootstrap overrides for this template
.bg-primary {
    background: $theme-primary;
    background: -webkit-linear-gradient($theme-primary, darken($theme-primary, 5%));
    background: linear-gradient($theme-primary, darken($theme-primary, 5%));
}

.text-primary {
    color: $theme-primary;
}

.no-gutter > [class*='col-'] {
    padding-right: 0;
    padding-left: 0;
}

.btn-outline {
    color: white;
    border: 1px solid;
    border-color: white;
    &:hover,
    &:focus,
    &:active,
    &.active {
        color: white;
        border-color: $theme-primary;
        background-color: $theme-primary;
    }
}

.btn {
    border-radius: 300px;
    @include alt-font;
}

.btn-xl {
    font-size: 11px;
    padding: 15px 45px;
}
</style>
