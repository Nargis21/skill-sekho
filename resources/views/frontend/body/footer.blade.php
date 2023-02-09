 @php
 use App\Models\ContactInformation;
 $contactInfo = ContactInformation::find(1);
 @endphp
 
 <!-- contact-area -->
 <section class="homeContact mt-5">
     <div class="container">
         <div class="homeContact__wrap mt-0 shadow-lg">
             <div class="row">
                 <div class="col-lg-6">
                     <div class="section__title">
                         <h2 class="title">Any questions? Feel free <br> to contact</h2>
                     </div>
                     <div class="homeContact__content">
                         <p>Our platform provides you with the tools and resources you need to build the future you want. Join our community of learners today and unlock your full potential!</p>
                         <h2 class="mail"><a href="mailto:Info@webmail.com">{{ $contactInfo->email1 }}</a></h2>
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="homeContact__form">
                         <form method="post" action="{{ route('contact.form') }}">
                             @csrf
                             <input name="name" type="text" placeholder="Enter name*">
                             @error('name')
                             <div class="text-danger">{{$message}}</div>
                             @enderror
                             <input name="email" type="email" placeholder="Enter mail*">
                             @error('email')
                             <div class="text-danger">{{$message}}</div>
                             @enderror
                             <input name="number" type="text" placeholder="Enter number*">
                             @error('number')
                             <div class="text-danger">{{$message}}</div>
                             @enderror
                             <textarea name="message" placeholder="Enter Massage*"></textarea>
                             @error('message')
                             <div class="text-danger">{{$message}}</div>
                             @enderror
                             <button type="submit">Send Message</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- contact-area-end -->
 <footer class="footer">
     <div class="container">
         <div class="row justify-content-between">
             <div class="col-lg-4">
                 <div class="footer__widget">
                     <div class="fw-title">
                         <h5 class="sub-title">Contact us</h5>
                         <h4 class="title">{{ $contactInfo->phone1 }}</h4>
                     </div>
                     <div class="footer__widget__text">
                         <p>Our platform provides you with the tools and resources you need to build the future you want. Join our community of learners today and unlock your full potential!</p>
                     </div>
                 </div>
             </div>
             <div class="col-xl-3 col-lg-4 col-sm-6">
                 <div class="footer__widget">
                     <div class="fw-title">
                         <h5 class="sub-title">my address</h5>
                         <h4 class="title">Bangladesh</h4>
                     </div>
                     <div class="footer__widget__address">
                         <p>{{ $contactInfo->address }}</p>
                         <a href="mailto:noreply@envato.com" class="mail">{{ $contactInfo->email1 }}</a>
                     </div>
                 </div>
             </div>
             <div class="col-xl-3 col-lg-4 col-sm-6">
                 <div class="footer__widget">
                     <div class="fw-title">
                         <h5 class="sub-title">Follow me</h5>
                         <h4 class="title">socially connect</h4>
                     </div>
                     <div class="footer__widget__social">
                         <p>Stay connected and build meaningful relationships with this guide to social networking</p>
                         <ul class="d-flex">
                             <a href="#"><i class="fab fa-facebook-f me-3 text-white"></i></a>
                             <a href="#"><i class="fab fa-twitter me-3 text-white"></i></a>
                             <a href="#"><i class="fab fa-behance me-3 text-white"></i></a>
                             <a href="#"><i class="fab fa-linkedin-in me-3 text-white"></i></a>
                             <a href="#"><i class="fab fa-instagram me-3 text-white"></i></a>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <div class="copyright__wrap">
             <div class="row">
                 <div class="col-12">
                     <div class="copyright__text text-center">
                         <p>Copyright © Skill Sekho <script>
                                 document.write(new Date().getFullYear())
                             </script> All right Reserved</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>