<?= $this->extend('layout/template-properties'); ?>
<?= $this->section('content'); ?>
  <!-- Start Proerty header  -->

  <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Properties Page</h2>
            <ol class="breadcrumb">
            <li><a href="/">HOME</a></li>            
            <li class="active">PROPERTIES</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- End Proerty header  -->

  <!-- Start Properties  -->
  <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">
            <div class="aa-properties-content-body">
              <ul class="aa-properties-nav">
              <?php
                $no= 1;
                foreach ($results as $row) {
                ?>
                <li>
                  <article class="aa-properties-item">
                    <a class="aa-properties-item-img" href="/detail/<?= $row->id; ?>">
                        <img src="<?= base_url() . "/uploads/data_thumbnail/" . $row->thumbnail; ?>" alt="img" style="height:238px">
                    </a>
                    <div class="aa-properties-item-content">
                      <div class="aa-properties-info">
                        <span><?= $row->rooms; ?> Rooms</span>
                        <span><?= $row->beds; ?> Beds</span>
                        <span><?= $row->baths; ?> Baths</span>
                        <span><?= $row->square_feet; ?> M<sup>2</sup></span>
                      </div>
                      <div class="aa-properties-about">
                        <h3><a href="/detail/<?= $row->id; ?>"><?= $row->villa_name; ?></a></h3>
                        <p><?= substr($row->description, 0, 30); ?>...</p>                           
                      </div>
                      <div class="aa-properties-detial">
                      <span class="aa-price">
                        <?= number_to_currency($row->price, 'IDR', 'en_DB'); ?>
                        </span>
                        <a href="/detail/<?= $row->id; ?>" class="aa-secondary-btn">View Details</a>
                      </div>
                    </div>
                  </article>
                </li>
                <?php
                }
                ?>
              </ul>
            </div>
            
            <!-- PAGINATION HERE -->


          </div>
        </div>
        <!-- Start properties sidebar -->
        <div class="col-md-4">
          <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3>SEARCH VILLA</h3>
              <form action="/user-search-villa-properties" method="post">
              <?= csrf_field(); ?>
                <div class="aa-single-advance-search">
                  <input type="text" placeholder="Find Your Villa, e.g.Ubud" name="query" required>
                </div>
                <div class="aa-single-advance-search">
                  <select id="" name="">
                   <option selected="" value="0">Category</option>
                    <option value="1">Flat</option>
                    <option value="2">Land</option>
                    <option value="3">Plot</option>
                    <option value="4">Commercial</option>
                  </select>
                </div>
                <div class="aa-single-advance-search">
                  <select id="" name="">
                    <option selected="" value="0">Type</option>
                    <option value="1">Flat</option>
                    <option value="2">Land</option>
                    <option value="3">Plot</option>
                    <option value="4">Commercial</option>
                  </select>
                </div>
                <div class="aa-single-advance-search">
                  <select id="" name="">
                    <option selected="" value="0">Type</option>
                    <option value="1">Flat</option>
                    <option value="2">Land</option>
                    <option value="3">Plot</option>
                    <option value="4">Commercial</option>
                  </select>
                </div>
                <div class="aa-single-filter-search">
                  <span>AREA (SQ)</span>
                  <span>FROM</span>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                  <span>TO</span>
                  <span id="skip-value-upper" class="example-val">100.00</span>
                  <div id="aa-sqrfeet-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>                  
                </div>
                <div class="aa-single-filter-search">
                  <span>PRICE ($)</span>
                  <span>FROM</span>
                  <span id="skip-value-lower2" class="example-val">30.00</span>
                  <span>TO</span>
                  <span id="skip-value-upper2" class="example-val">100.00</span>
                  <div id="aa-price-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>      
                </div>
                <div class="aa-single-advance-search">
                  <input type="submit" value="Search" class="aa-search-btn">
                </div>
              </form>
            </div> 
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3>Populer Properties</h3>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/item/1.jpg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">This is Title</a></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                
                  <span>$65000</span>
                </div>              
              </div>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/item/1.jpg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">This is Title</a></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                
                  <span>$65000</span>
                </div>              
              </div>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/item/1.jpg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">This is Title</a></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                
                  <span>$65000</span>
                </div>              
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- / Properties  -->
  <?= $this->endSection(); ?>

  