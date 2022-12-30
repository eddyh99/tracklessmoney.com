<!-- Mashead header-->
<header class="slider bg-slider-money">
    <nav class="navbar navbar-expand-lg bg-transparent" id="mainNav">
        <div class="container-fluid ps-0 pe-5">
            <a class="navbar-brand fw-bold" href="#page-top">
                <img src="<?= base_url(); ?>assets/images/tc-money-new.png">
            </a>
            <button class="navbar-toggler toggler-trackless" type="button" data-bs-toggle="offcanvas"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3 mt-lg-3 text-white" href="#mission">MISSION</a>
                    </li>
                    <li class="nav-item"><a class="nav-link me-lg-3 mt-lg-3 text-white" href="#service">SERVICE</a>
                    </li>
                    <li class="nav-item"><a class="nav-link me-lg-3 mt-lg-3 text-white" href="#contact">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://tracklessproject.com" class="bg-trackless nav-link me-lg-3">
                            <svg width="57" height="53" viewBox="0 0 57 53" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M26.908 1.37204C27.8784 0.750986 29.1214 0.750986 30.0918 1.37204L54.7011 17.122C56.0749 18.0012 56.4758 19.8276 55.5966 21.2013C54.7174 22.575 52.8911 22.9759 51.5174 22.0967L49.1717 20.5955V44.2188C49.1717 48.568 45.646 52.0938 41.2967 52.0938H15.703C11.3538 52.0938 7.828 48.568 7.828 44.2188V20.5955L5.48239 22.0967C4.10868 22.9759 2.28235 22.575 1.40317 21.2013C0.523991 19.8276 0.924893 18.0012 2.29861 17.122L26.908 1.37204ZM19.1483 24.0391C18.3328 24.0391 17.6717 24.7001 17.6717 25.5156C17.6717 26.3311 18.3328 26.9922 19.1483 26.9922H37.8514C38.6669 26.9922 39.328 26.3311 39.328 25.5156C39.328 24.7001 38.6669 24.0391 37.8514 24.0391H19.1483ZM17.6717 31.4219C17.6717 30.6064 18.3328 29.9453 19.1483 29.9453H27.0233C27.8388 29.9453 28.4999 30.6064 28.4999 31.4219C28.4999 32.2374 27.8388 32.8984 27.0233 32.8984H19.1483C18.3328 32.8984 17.6717 32.2374 17.6717 31.4219ZM19.1483 35.8516C18.3328 35.8516 17.6717 36.5126 17.6717 37.3281C17.6717 38.1436 18.3328 38.8047 19.1483 38.8047H30.9608C31.7763 38.8047 32.4374 38.1436 32.4374 37.3281C32.4374 36.5126 31.7763 35.8516 30.9608 35.8516H19.1483Z"
                                    fill="#00DD9C" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close close-trackless" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#mission">MISSION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">SERVICE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://tracklessproject.com">
                                <svg width="57" height="53" viewBox="0 0 57 53" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M26.908 1.37204C27.8784 0.750986 29.1214 0.750986 30.0918 1.37204L54.7011 17.122C56.0749 18.0012 56.4758 19.8276 55.5966 21.2013C54.7174 22.575 52.8911 22.9759 51.5174 22.0967L49.1717 20.5955V44.2188C49.1717 48.568 45.646 52.0938 41.2967 52.0938H15.703C11.3538 52.0938 7.828 48.568 7.828 44.2188V20.5955L5.48239 22.0967C4.10868 22.9759 2.28235 22.575 1.40317 21.2013C0.523991 19.8276 0.924893 18.0012 2.29861 17.122L26.908 1.37204ZM19.1483 24.0391C18.3328 24.0391 17.6717 24.7001 17.6717 25.5156C17.6717 26.3311 18.3328 26.9922 19.1483 26.9922H37.8514C38.6669 26.9922 39.328 26.3311 39.328 25.5156C39.328 24.7001 38.6669 24.0391 37.8514 24.0391H19.1483ZM17.6717 31.4219C17.6717 30.6064 18.3328 29.9453 19.1483 29.9453H27.0233C27.8388 29.9453 28.4999 30.6064 28.4999 31.4219C28.4999 32.2374 27.8388 32.8984 27.0233 32.8984H19.1483C18.3328 32.8984 17.6717 32.2374 17.6717 31.4219ZM19.1483 35.8516C18.3328 35.8516 17.6717 36.5126 17.6717 37.3281C17.6717 38.1436 18.3328 38.8047 19.1483 38.8047H30.9608C31.7763 38.8047 32.4374 38.1436 32.4374 37.3281C32.4374 36.5126 31.7763 35.8516 30.9608 35.8516H19.1483Z"
                                        fill="#00DD9C" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container px-5 py-5">
        <div class="row gx-5 align-items-center">
            <div class="col-md-12 col-lg-8">
                <!-- Mashead text and app badges-->
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="text-green-trackless text-green-trackless--header f-rhd mb-3">Next Generation
                        Global Innovators </h1>
                    <p class="text-trackless lead fw-normal mb-5">Grow your business with our state-of-the art
                        technology</p>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="bg-black my-sm-0 my-md-5 mt-5 mb-0">
    <div class="container px-5">
        <div
            class="row gx-5 align-items-center justify-content-center justify-content-md-start justify-content-lg-between">
            <div class="d-none d-sm-none d-md-none d-lg-block col-lg-6">
                <div class="px-5 px-sm-0">
                    <img class="img-fluid" style="object-fit: cover; height: 500px; width: 500px;"
                        src="<?= base_url(); ?>/assets/images/bumi-trackless.png" alt="..." />
                </div>
            </div>
            <div class="col-12 col-md-10 col-lg-6 text-white">
                <p class="content-title-top f-roboto my-2" id="mission">
                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="5.58167" cy="6.17542" r="5.38489" fill="#C4C4C4" />
                    </svg>
                    &nbsp;
                    WHAT IS <span class="text-green">TRACKLESS MONEY</span>
                </p>
                <h2 class="content-title-second f-roboto mb-4">A revolutionary payment gateway, the smart choice</h2>
                <p class="content-info f-roboto mb-5 mb-lg-0">TracklessMoney is a powerful multi-currency payment
                    gateway, completely anonymous, which can be integrated online, provides safe, fast and cheap
                    transactions and can be used by both, companies and individuals via API/Plugin.</p>
                <div class="box-btn-green my-5 p-3 text-center">
                    <p>Connect your phisycal or online bussines now</p>
                    <a href="<?= base_url('auth/api_plugin'); ?>" class="btn btn-green px-4 py-2">API/Plugin</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-content-line pt-0 pb-5 py-sm-0 py-md-0 py-lg-5 ">
    <div class="container px-5">
        <div
            class="row gx-5 align-items-center justify-content-center justify-content-md-start justify-content-lg-between">
            <div class="col-12 col-md-10 col-lg-8 text-white pb-md-5">
                <p class="content-title-top f-roboto my-4" id="service">
                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="5.58167" cy="6.17542" r="5.38489" fill="#C4C4C4" />
                    </svg>
                    &nbsp;
                    WHAT WE DO</span>
                </p>
                <p class="content-info f-roboto mb-0 mb-sm-0 mb-md-5 mb-lg-0">
                    In addiction to provide API/Plugin, thanks to the cooperation with highly qualified partners, we can
                    carry out projects with innovative technologies according to customer requests and optimize them to
                    increase business, visibility and simplify collection and payment processes.<br>
                    We can help you in this challenge by creating Apps, Dapps, Social networks, streamvideo platforms,
                    etc.
                </p>

                <a href="#" class="btn btn-green my-5 px-5 py-2">Apply now</a>
            </div>
            <div class="col-md-2 col-lg-4">
            </div>
            <div class="col-md-2 col-lg-6">
            </div>
            <div class="col-12 col-md-10 col-lg-6 text-white">
                <div class="box-money py-5 px-4 p-sm-5">
                    <img src="<?= base_url() ?>assets/images/bola-aneh.png" alt="logo"
                        class="ball-light-top d-none d-lg-inline">
                    <img src="<?= base_url() ?>assets/images/bola-aneh.png" alt="logo" class="ball-light-bottom">
                    <img src="<?= base_url() ?>assets/images/tc-money-new.png" alt="logo" class="img-in-box">
                    <p class="content-info f-roboto mb-5 mb-lg-3">
                        Send an email with your project description and our experts will contact you as soon as
                        possible
                    </p>
                    <a href="#" class="content-info f-roboto mail">linkemail@gmail.com</a>
                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="powered-money d-flex justify-content-center">
                    <span class="f-monserat py-4">Powered by </span>
                    <img src="<?= base_url() ?>assets/images/tracklessproject.png" alt="logo">
                </div>
                <div class="sponsor-money d-flex justify-content-center flex-wrap my-5 pb-5 text-center">
                    <a href="#" class="mx-2 mb-2 mx-sm-3 mb-sm-3 p-2 p-sm-3 p-md-4">
                        <div class="box-sponsor rounded-circle p-2 p-sm-3 p-md-4">
                            <img src="<?= base_url() ?>assets/images/sponsor1.png" alt="logo"
                                class="py-1 px-2 py-sm-1 px-sm-2 py-md-2 px-md-4">
                        </div>
                        <span class="mt-3 d-block">Coming soon</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<footer class="bg-footer-trackless py-3">
    <div class="container-fluid px-md-5">
        <div class="container">
            <div class="bg-imagebox">
                <img src="<?= base_url() ?>assets/images/trackless-fit.png" alt="" class="footer-logo-center">
            </div>
            <div class="d-flex justify-content-around">
                <div class="col-4">
                    <img src="<?= base_url(); ?>assets/images/footer-logo.png" class="footer-logo">
                    <div class="d-flex flex-wrap icon-sosmed">
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-1 mt-sm-3">
                            <img src="<?= base_url() ?>assets/images/fb-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-1 mt-sm-3">
                            <img src="<?= base_url() ?>assets/images/twitter-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-1 mt-sm-3">
                            <img src="<?= base_url() ?>assets/images/ig-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-1 mt-sm-3">
                            <img src="<?= base_url() ?>assets/images/c-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-1 mt-sm-3">
                            <img src="<?= base_url() ?>assets/images/linkedin-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-1 mt-sm-3">
                            <img src="<?= base_url() ?>assets/images/tiktok-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-1 mt-sm-3">
                            <img src="<?= base_url() ?>assets/images/youtube-icon.png" class="p-1">
                        </div>
                    </div>
                </div>
                <div class="col-4">&nbsp;</div>
                <div class="col-4 footer-contact" id="contact">
                    <h2>Contact us</h2>
                    <span>Telegramchanel</span>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-end footer-menus" translate="no">
            <a href="https://tracklessproject.com" class="">TracklessProject</a> |
            <a href="https://tracklessmail.com" class="">TracklessMail</a> |
            <a href="https://tracklesschat.com" class="">TracklessChat</a> |
            <a href="https://tracklesscompany.com" class="">TracklessCompany</a> |
            <a href="https://tracklessbank.com" class="">TracklessBank</a> |
            <a href="https://tracklesscrypto.com" class="">TracklessCrypto</a> |
            <a href="https://tracklessmoney.com" class="active">TracklessMoney</a>
        </div>
    </div>
</footer>