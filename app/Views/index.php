<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
  <!-- Latest property -->
  <section id="aa-latest-property">
    <div class="container">
      <div class="aa-latest-property-area">
        <div class="aa-title">
          <h2>Latest Properties</h2>
          <span></span>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit ea nobis quae vero voluptatibus.</p>         
        </div>
        <div class="aa-latest-properties-content">
          <div class="row">
          <?php foreach ($villa as $row) { 
            $booking = new \App\Models\Booking();
            $bookings = $booking->where('status', 'Paid')->findAll();
            $booked_villa_ids = array();
            foreach ($bookings as $booking) {
                $booked_villa_ids[] = $booking['id_villa'];
            }
            ?>
            <div class="col-md-4">
              <article class="aa-properties-item">
                <a href="/detail/<?= $row['id']; ?>" class="aa-properties-item-img">
                  <img src="<?= base_url() . "/uploads/data_thumbnail/" . $row['thumbnail']; ?>" alt="img" style="height:238px">
                </a>
                <?php if (in_array($row['id'], $booked_villa_ids)) { ?>
                  <div class="aa-tag sold-out">
                    Booked
                  </div>
                <?php } else { ?>
                  <div class="aa-tag for-rent">
                    Availabe
                  </div>
                <?php } ?>
                <div class="aa-properties-item-content">
                  <div class="aa-properties-info">
                    <span><?= $row['rooms']; ?> Rooms</span>
                    <span><?= $row['beds']; ?> Beds</span>
                    <span><?= $row['baths']; ?> Baths</span>
                    <span><?= $row['square_feet']; ?> M<sup>2</sup></span>
                  </div>
                  <div class="aa-properties-about">
                    <h3><a href="/detail/<?= $row['id']; ?>"><?= $row['villa_name']; ?></a></h3>
                    <p><?= substr($row['description'], 0, 30); ?>...</p>                      
                  </div>
                  <div class="aa-properties-detial">
                    <span class="aa-price">
                    <?= number_to_currency($row['price'], 'IDR', 'en_DB'); ?>
                    </span>
                    <a href="/detail/<?= $row['id']; ?>" class="aa-secondary-btn">View Details</a>
                  </div>
                </div>
              </article>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Latest property -->

  <!-- Service section -->
  <section id="aa-service">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-service-area">
            <div class="aa-title">
              <h2>Our Service</h2>
              <span></span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit ea nobis quae vero voluptatibus.</p>
            </div>
            <!-- service content -->
            <div class="aa-service-content">
              <div class="row">
                <div class="col-md-3">
                  <div class="aa-single-service">
                    <div class="aa-service-icon">
                      <span class="fa fa-home"></span>
                    </div>
                    <div class="aa-single-service-content">
                      <h4><a href="#">Property Sale</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="aa-single-service">
                    <div class="aa-service-icon">
                      <span class="fa fa-check"></span>
                    </div>
                    <div class="aa-single-service-content">
                      <h4><a href="#">Property Rent</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="aa-single-service">
                    <div class="aa-service-icon">
                      <span class="fa fa-crosshairs"></span>
                    </div>
                    <div class="aa-single-service-content">
                      <h4><a href="#">Property Development</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="aa-single-service">
                    <div class="aa-service-icon">
                      <span class="fa fa-bar-chart-o"></span>
                    </div>
                    <div class="aa-single-service-content">
                      <h4><a href="#">Market Analysis</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Service section -->

  <!-- Promo Banner Section -->
  <section id="aa-promo-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-banner-area">
            <h3>Find Your Best Property</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, ex illum corporis quibusdam numquam quisquam optio explicabo. Officiis odit quia odio dignissimos eius repellat id!</p>
            <a href="/users-list-villa" class="aa-view-btn">View Villa</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo Banner Section -->

  <!-- Our Agent Section-->
  <section id="aa-agents">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-agents-area">
            <div class="aa-title">
              <h2>Our Agents</h2>
              <span></span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit ea nobis quae vero voluptatibus.</p>
            </div>
            <!-- agents content -->
            <div class="aa-agents-content">
              <ul class="aa-agents-slider">
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="/img/agents/agent-1.png" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Philip Smith</a></h4>
                      <span>Top Agent</span>
                      <div class="aa-agent-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="/img/agents/agent-5.png" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Adam Barney</a></h4>
                      <span>Expert Agent</span>
                      <div class="aa-agent-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="/img/agents/agent-3.png" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Paul Walker</a></h4>
                      <span>Director</span>
                      <div class="aa-agent-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="/img/agents/agent-4.png" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">John Smith</a></h4>
                      <span>Jr. Agent</span>
                      <div class="aa-agent-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="/img/agents/agent-1.png" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Philip Smith</a></h4>
                      <span>Top Agent</span>
                      <div class="aa-agent-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="/img/agents/agent-5.png" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Adam Barney</a></h4>
                      <span>Expert Agent</span>
                      <div class="aa-agent-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="/img/agents/agent-3.png" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">Paul Walker</a></h4>
                      <span>Director</span>
                      <div class="aa-agent-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                      <img src="/img/agents/agent-4.png" alt="agent member image">
                    </div>
                    <div class="aa-agetns-info">
                      <h4><a href="#">John Smith</a></h4>
                      <span>Jr. Agent</span>
                      <div class="aa-agent-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Our Agent Section-->

  <!-- Latest blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <div class="aa-title">
              <h2>Latest News</h2>
              <span></span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe magni, est harum repellendus. Accusantium, nostrum!</p>
            </div>
            <div class="aa-latest-blog-content">
              <div class="row">
                <!-- start single blog -->
                <div class="col-md-4">
                  <article class="aa-blog-single">
                    <figure class="aa-blog-img">
                      <a href="#"><img src="/img/blog-img-1.jpg" alt="img"></a>
                      <span class="aa-date-tag">15 April, 16</span>
                    </figure>
                    <div class="aa-blog-single-content">
                      <h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio est quaerat magnam exercitationem voluptas, voluptatem sed quam ab laborum voluptatum tempore dolores itaque, molestias vitae.</p>
                      <div class="aa-blog-single-bottom">
                        <a href="#" class="aa-blog-author"><i class="fa fa-user"></i> Admin</a>
                        <a href="#" class="aa-blog-comments"><i class="fa fa-comment-o"></i>6</a>
                      </div>
                    </div>
                   
                  </article>
                </div>
                <!-- start single blog -->
                <div class="col-md-4">
                  <article class="aa-blog-single">
                    <figure class="aa-blog-img">
                      <a href="#"><img src="/img/blog-img-2.jpg" alt="img"></a>
                      <span class="aa-date-tag">15 April, 16</span>
                    </figure>
                    <div class="aa-blog-single-content">
                      <h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio est quaerat magnam exercitationem voluptas, voluptatem sed quam ab laborum voluptatum tempore dolores itaque, molestias vitae.</p>
                      <div class="aa-blog-single-bottom">
                        <a href="#" class="aa-blog-author"><i class="fa fa-user"></i> Admin</a>
                        <a href="#" class="aa-blog-comments"><i class="fa fa-comment-o"></i>6</a>
                      </div>
                    </div>                   
                  </article>
                </div>
                <!-- start single blog -->
                <div class="col-md-4">
                  <article class="aa-blog-single">
                    <figure class="aa-blog-img">
                      <a href="#"><img src="/img/blog-img-3.jpg" alt="img"></a>
                      <span class="aa-date-tag">15 April, 16</span>
                    </figure>
                    <div class="aa-blog-single-content">
                      <h3><a href="#">Lorem ipsum dolor sit amet, consectetur.</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio est quaerat magnam exercitationem voluptas, voluptatem sed quam ab laborum voluptatum tempore dolores itaque, molestias vitae.</p>
                      <div class="aa-blog-single-bottom">
                        <a href="#" class="aa-blog-author"><i class="fa fa-user"></i> Admin</a>
                        <a href="#" class="aa-blog-comments"><i class="fa fa-comment-o"></i>6</a>
                      </div>
                    </div>                   
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Latest blog -->

  <?= $this->endSection(); ?>

  