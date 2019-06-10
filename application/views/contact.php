<?php
include 'header.php';
?>
   <!-- Login Section -->
  <section class="padding ptb-xs-60">
        <div class="container">

          <div class="row">

            <div class="col-sm-8">

              <div class="headeing pb-30">
                <h2>Get in Touch</h2>
                <span class="b-line l-left line-h"></span>
              </div>
              <!-- Contact FORM -->
              <form class="contact-form " id="contact">
                <!-- IF MAIL SENT SUCCESSFULLY -->
                <div id="success">
                  <div role="alert" class="alert alert-success">
                    <strong>Thanks</strong> for contacting us. Your message has been sent.
                  </div>
                </div>
                <!-- END IF MAIL SENT SUCCESSFULLY -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-field">
                      <input class="input-sm form-full" id="name" type="text" name="form-name" placeholder="Your Name">
                    </div>
                    <div class="form-field">
                      <input class="input-sm form-full" id="email" type="text" name="form-email" placeholder="Email" >
                    </div>
                    <div class="form-field">
                      <input class="input-sm form-full" id="sub" type="text" name="form-subject" placeholder="Subject">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-field">
                      <textarea class="form-full" id="message" rows="7" name="form-message" placeholder="Your Message" ></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12 mt-30">
                    <button class="btn-text" type="button" id="submit" name="button">
                      Send Message
                    </button>
                  </div>
                </div>
              </form>
              <!-- END Contact FORM -->
            </div>

            <div class="col-sm-4 contact">
              <div class="headeing pb-20">
                <h2>Contact Info</h2>
                <span class="b-line l-left line-h"></span>
              </div>
              <div class="contact-info">

                <ul class="info">
                  <li>
                    <div class="icon ion-ios-location"></div>
                    <div class="content">
                      <p>
                        4, Dipeolu Street, Off Allen Avenue
                      </p>
                      <p>
                        Ikeja, Lagos State.
                      </p>
                    </div>
                  </li>

                  <li>
                    <div class="icon ion-android-call"></div>
                    <div class="content">
                      <p>
                        +2348060996663
                      </p>
                      <p>
                        +2348073456219
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="icon ion-ios-email"></div>
                    <div class="content">
                      <p>
                        info@getdiesel.com
                      </p>
                      <p>
                        http://getdiesel.ng
                      </p>
                    </div>
                  </li>
                </ul>
                <ul class="event-social">
                  <li>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </section>

<?php
include 'footer.php';
?>
