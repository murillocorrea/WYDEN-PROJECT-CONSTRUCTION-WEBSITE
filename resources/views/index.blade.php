<!DOCTYPE html>
   <script>
      const BACKEND_URL = "https://caeb-170-83-72-252.ngrok-free.app";
   </script>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== FAVICON ===============-->
      <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">

      <!--=============== FONTAWESOME ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Site de contrução</title>
   </head>
   <body>
      <!--==================== HEADER ====================-->
      @include('header-section')

      <!--==================== MAIN ====================-->
      <main class="main">
         <!--==================== HOME ====================-->
         @include('home-section')

         <!--==================== ABOUT ====================-->
         @include('about-section')

         <!--==================== SERVICES ====================-->
         @include('services-section')

         <!--==================== PROJECTS ====================-->
         @include('projects-section')

         <!--==================== CONTACT ====================-->
         @include('contact-section')
      </main>

      <!--==================== FOOTER ====================-->
      <footer class="footer">
         <div class="footer__container container grid">
            <div>
               <a href="#" class="footer__logo">
                  <i class="ri-building-3-line"></i>
                  <span>Construir</span>
               </a>

               <p class="footer__description">Nós contruimos segurança <br> e confiança nos lares.</p>

               <address class="footer__email">Email: construct123@email.com</address>
            </div>

            <div class="footer__content grid">
               <div>
                  <h3 class="footer__title">Empresa</h3>

                  <ul class="footer__links">
                     <li>
                        <a href="#about" class="footer__link">Sobre nós</a>
                     </li>

                     <li>
                        <a href="#services" class="footer__link">Serviços</a>
                     </li>

                     <li>
                        <a href="#projects" class="footer__link">Projetos</a>
                     </li>
                  </ul>
               </div>

               <div>
                  <h3 class="footer__title">Informações</h3>

                  <ul class="footer__list">
                     <li>
                        <address class="footer__info">Peru - Lima <br> Av #321</address>
                     </li>

                     <li>
                        <address class="footer__info">9AM - 11PM</address>
                     </li>
                  </ul>
               </div>

               <div>
                  <h3 class="footer__title">Mídia Social</h3>

                  <div class="footer__social">
                     <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                        <i class="ri-facebook-circle-line"></i>
                     </a>

                     <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                        <i class="ri-instagram-line"></i>
                     </a>

                     <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                        <i class="ri-twitter-x-fill"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </footer>

      <!--========== SCROLL UP ==========-->
      <a href="#" class="scrollup" id="scroll-up">
         <i class="ri-arrow-up-line"></i>
      </a>

      <!--=============== SCROLLREVEAL ===============-->
      <script src="assets/js/scrollreveal.min.js"></script>

      <!--=============== SWIPER JS ===============-->
      <script src="assets/js/swiper-bundle.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>

      <!--=============== FORM VALIDATION JS ===============-->
      <script src="assets/js/formValidation.js"></script>

      <!--=============== REGISTER PROJECT MODAL JS ===============-->
    <script src="assets/js/registerProjectModal.js"></script>

      <!--=============== SWEETALERT2 JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('phone').addEventListener('input', function(event) {
            var phone = event.target.value.replace(/\D/g, '');
            phone = phone.substring(0, 11);
            event.target.value = phone.replace(/(\d{2})(\d{1})(\d{4})(\d{0,4})/, '($1) $2 $3-$4');
        });
    });
</script>
